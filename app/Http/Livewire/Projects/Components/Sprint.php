<?php

namespace App\Http\Livewire\Projects\Components;

use Livewire\Component;

class Sprint extends Component
{
    public $sprint;
    public $show_input_issue = false;
    public $new_issue = '';

    public function getIssuesProperty()
    {
        return $this->sprint->issues()->get();
    }

    public function showInputIssue()
    {
        $this->show_input_issue = true;
    }

    public function hideInputIssue()
    {
        $this->show_input_issue = false;
    }

    public function createIssue($name) {
        $code = $this->sprint->project->code;
        $count = $this->sprint->project->issues()->count() + 1;

        $this->sprint->issues()->create([
            'code' => "{$code}-{$count}",
            'name' => $name,
        ]);

        $this->hideInputIssue();
        $this->reset('new_issue');
    }

    public function render()
    {
        return view('livewire.projects.components.sprint');
    }
}
