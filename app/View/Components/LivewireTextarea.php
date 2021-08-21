<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LivewireTextarea extends Component
{
    public $label;
    public $identifier;
    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($identifier, $model, $label)
    {
        $this->label      = $label;
        $this->identifier = $identifier;
        $this->model      = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.livewire-textarea');
    }
}
