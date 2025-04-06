<?php

namespace App\View\Components;

use App\Models\Game;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GamesTab extends Component
{
    public array $newestGames;
    public array $topSellerGame;
    public array $freeGame;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $newestGames = Game::orderByDesc('created_at')->take(10)->get();

        $this->newestGames = $newestGames->map(
            fn(Game $game) => $game->toArray()
        )->toArray();

        $newestCategory = $newestGames->map(function(Game $game){
            $categories = $game->categories->pluck('category_name')->toArray();
            return implode(', ', $categories);
        });

        foreach ($this->newestGames as $index => $game) {
            $game['category'] = $newestCategory[$index];
            $this->newestGames[$index] = $game;
        }

        //Top Seller

        $topSellerGame = Game::withCount('users')->orderByDesc('users_count')->take(10)->get();

        $this->topSellerGame = $topSellerGame->map(
            fn(Game $game) => $game->toArray()
        )->toArray();

        $bestSellerCategory = $topSellerGame->map(function(Game $game){
            $categories = $game->categories->pluck('category_name')->toArray();
            return implode(', ', $categories);
        });

        foreach ($this->topSellerGame as $index => $game) {
            $game['category'] = $bestSellerCategory[$index];
            $this->topSellerGame[$index] = $game;
        }

        //Free

        $freeGame = Game::where('price', 0)->take(10)->get();

        $this->freeGame = $freeGame->map(
            fn(Game $game) => $game->toArray()
        )->toArray();

        $freeCategory = $freeGame->map(function(Game $game){
            $categories = $game->categories->pluck('category_name')->toArray();
            return implode(', ', $categories);
        });

        foreach ($this->freeGame as $index => $game) {
            $game['category'] = $freeCategory[$index];
            $this->freeGame[$index] = $game;
        }

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.games-tab');
    }
}
