<?php

namespace App\View\Components;

use App\Models\Game;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HotCarousel extends Component
{
    /**
     * Create a new component instance.
     */
    public array $games;

    public function __construct(
    )
    {
        $this->games = (Game::orderByDesc('view')->take(10)->get())->toArray();
//        dd(json_encode($this->games));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hot-carousel');
    }
}
