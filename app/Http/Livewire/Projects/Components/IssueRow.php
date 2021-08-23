<?php

namespace App\Http\Livewire\Projects\Components;

use Livewire\Component;

class IssueRow extends Component
{
    public $issue;

    protected function getListeners()
    {
        return [
            "updated_issue_{$this->issue->id}" => "refreshIssue",
        ];
    }

    public function refreshIssue()
    {
        $this->issue->refresh();
    }

    public function render()
    {
        return view('livewire.projects.components.issue-row');
    }
}
