<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrimaryButtonLink extends Component
{
    public $label;
    public $icon;
    public $route;
    public $routeParams;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $route, $icon = null, $routeParams = [])
    {
        $this->label       = $label;
        $this->icon        = $icon;
        $this->route       = $route;
        $this->routeParams = $routeParams;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.primary-button-link');
    }
}
