<?php

namespace App\Http\Livewire\Projects\Components;

use App\Models\Issue;
use Livewire\Component;

class IssueCard extends Component
{
    public $issue;

    public function mount($id)
    {
        $this->issue = Issue::find($id);
    }

    /*
     * Name functions 
     */
    public $show_issue_name_input = false;
    public $issue_name = '';
    public function showIssueNameInput()
    {
        $this->issue_name = $this->issue->name;
        $this->show_issue_name_input = true;
        $this->dispatchBrowserEvent("set_focus_on_issue_name_input");
    }
    public function hideIssueNameInput()
    {
        $this->issue_name = '';
        $this->show_issue_name_input = false;
    }
    public function updateIssueName()
    {
        if ($this->issue_name) {
            $this->issue->name = $this->issue_name;
            $this->issue->save();
            $this->issue->refresh();
            $this->hideIssueNameInput();
            $this->emit("updated_issue_{$this->issue->id}");
        }
    }

    public function render()
    {
        return view('livewire.projects.components.issue-card');
    }
}
