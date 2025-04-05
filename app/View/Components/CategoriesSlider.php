<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoriesSlider extends Component
{
    /**
     * Create a new component instance.
     */

    public array $categories;
    public array $categoriesImg;
    public function __construct()
    {
        $categories = Category::all();

        $this->categories = array_chunk($categories->toArray(), 4);
        $this->categoriesImg = $categories->map(
            fn(Category $category) => $category->games()->orderByDesc('view')->take(1)->get()->pluck('cover_image')
        )->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categories-slider');
    }
}
