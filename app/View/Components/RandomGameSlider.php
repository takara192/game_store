<?php

namespace App\View\Components;

use App\Models\Game;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RandomGameSlider extends Component
{
    /**
     * Create a new component instance.
     */

    public array $games;

    public function __construct()
    {
        $this->games = array_chunk(Game::inRandomOrder()->take(24)->get()->toArray(), 6);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.random-game-slider');
    }
}
