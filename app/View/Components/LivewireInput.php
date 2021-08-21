<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LivewireInput extends Component
{
    public $label;
    public $identifier;
    public $model;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($identifier, $model, $label, $type = "text")
    {
        $this->label      = $label;
        $this->identifier = $identifier;
        $this->model      = $model;
        $this->type       = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.livewire-input');
    }
}
