<?php

namespace App\Http\Livewire\Projects\Components;

use App\Models\Issue;
use App\Models\User;
use Livewire\Component;

class IssueCard extends Component
{
    public $issue;

    public function mount($id)
    {
        $this->issue       = Issue::find($id);
        $this->sprint_id   = $this->issue->sprint_id;
        $this->reported_by = $this->issue->reported_by;
    }

    /*
     * Computed properties
     */
    public function getSprintsProperty()
    {
        return $this->issue->project->sprints()->get();
    }
    public function getUsersProperty()
    {
        return User::all();
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

    /*
     * Sprint functions
     */
    public $sprint_id;
    public function changeSprint()
    {
        $this->issue->sprint_id = $this->sprint_id;
        $this->issue->save();
        $this->alert('success', __('panel.issues.sprint_changed'));
    }

    /*
     * User functions
     */
    public $reported_by;
    public function changeReportedBy()
    {
        $this->issue->reported_by = $this->reported_by;
        $this->issue->save();
        $this->alert('success', __('panel.issues.reporter_changed'));
    }

    public function render()
    {
        return view('livewire.projects.components.issue-card');
    }
}
