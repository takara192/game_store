<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LabelInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $labelColor = 'text-white',
        public $labelSize = 'text-base',
        public ?String $label = null,
        public $inputColor = 'bg-[#32353c]',
        public $inputType = 'text',
        public ?String $id = null,
        public ?String $name = null,
        public ?String $inputClass = null,
        public ?String $value = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.label-input');
    }
}
