<?php

namespace App\Http\Livewire\Projects\Components;

use Livewire\Component;

class IssueRow extends Component
{
    public $issue;
    
    public function render()
    {
        return view('livewire.projects.components.issue-row');
    }
}
