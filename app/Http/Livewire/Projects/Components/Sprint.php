<?php

namespace App\Http\Livewire\Projects\Components;

use Livewire\Component;

class Sprint extends Component
{
    public $sprint;
    public $show_input_ticket = false;
    public $new_ticket = '';

    public function showInputTicket()
    {
        $this->show_input_ticket = true;
    }

    public function hideInputTicket()
    {
        $this->show_input_ticket = false;
    }

    public function createTicket($name) {
        $this->hideInputTicket();
    }

    public function render()
    {
        return view('livewire.projects.components.sprint');
    }
}
