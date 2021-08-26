<?php

namespace App\Http\Livewire\Projects\Components;

use App\Models\Issue;
use App\Models\User;
use Livewire\Component;

class IssueCard extends Component
{
    protected $listeners = [
        'saveDescription',
    ];
    public $issue;

    public function mount($id)
    {
        $this->issue           = Issue::find($id);
        $this->estimated_hours = $this->issue->estimated_hours;
        $this->story_point     = $this->issue->story_point;
        $this->sprint_id       = $this->issue->sprint_id;
        $this->reported_by     = $this->issue->reported_by;
        if ($this->issue->assigned_to) {
            $this->assigned_to = $this->issue->assigned_to;
        }
        $this->dispatchBrowserEvent('show_summernote');
        $this->emit('show_summernote');
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
            $this->alert('success', __('panel.issues.updated_successfully'));
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
    public $assigned_to;
    public function changeAssignee()
    {
        $this->issue->assigned_to = $this->assigned_to ?: null;
        $this->issue->save();
        $this->alert('success', __('panel.issues.reporter_changed'));
    }

    /*
     * Estimated hours functions
     */
    public $estimated_hours;
    public $show_estimated_hours = false;
    public function showEstimatedHoursInput()
    {
        $this->show_estimated_hours = true;
        $this->dispatchBrowserEvent('set_focus_on_estimated_hours');
    }
    public function hideEstimatedHoursInput()
    {
        $this->estimated_hours = $this->issue->estimated_hours;
        $this->show_estimated_hours = false;
    }
    public function updateEstimatedHours()
    {
        $this->issue->estimated_hours = $this->estimated_hours;
        $this->issue->save();
        $this->show_estimated_hours = false;
        $this->alert('success', __('panel.issues.updated_successfully'));
    }

    /*
     * Estimated hours functions
     */
    public $story_point;
    public $show_story_point = false;
    public function showStoryPointsInput()
    {
        $this->show_story_point = true;
        $this->dispatchBrowserEvent('set_focus_on_story_point');
    }
    public function hideStoryPointsInput()
    {
        $this->story_point = $this->issue->story_point;
        $this->show_story_point = false;
    }
    public function updateStoryPoints()
    {
        $this->issue->story_point = $this->story_point;
        $this->issue->save();
        $this->show_story_point = false;
        $this->alert('success', __('panel.issues.updated_successfully'));
    }

    /*
     * Description functions
     */
    public function saveDescription($description) {
        $this->issue->description = $description;
        $this->issue->save();
        $this->alert('success', __('panel.issues.description_issue_saved'));
    }

    public function render()
    {
        return view('livewire.projects.components.issue-card');
    }
}
