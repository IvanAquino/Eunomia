<?php

namespace App\Http\Livewire\Projects\Components;

use Livewire\Component;

class Sprint extends Component
{
    public $sprint;
    public $show_input_issue = false;
    public $new_issue = '';

    public function showInputIssue()
    {
        $this->show_input_issue = true;
    }

    public function hideInputIssue()
    {
        $this->show_input_issue = false;
    }

    public function createIssue($name) {
        $this->hideInputIssue();
    }

    public function render()
    {
        return view('livewire.projects.components.sprint');
    }
}
