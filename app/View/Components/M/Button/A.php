<?php

namespace App\View\Components\M\Button;

use Illuminate\View\Component;

class A extends Component
{
    public $isGood;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isGood = null)
    {
        $this->isGood = $isGood;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.m.button.a');
    }
}
