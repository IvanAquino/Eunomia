<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LivewireSelect extends Component
{
    public $label;
    public $identifier;
    public $model;
    public $help;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $identifier, $model)
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
        return view('components.livewire-select');
    }
}
