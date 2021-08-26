<?php

namespace App\Http\Livewire\Projects;

use App\Http\Livewire\Projects\Traits\SprintFunctions;
use Livewire\Component;

class Backlog extends Component
{
    use SprintFunctions;
    protected $listeners = [
        'showIssueCard',
    ];

    public $project;
    public $issue_id;

    public function showIssueCard($issue_id)
    {
        if ($this->issue_id == $issue_id) {
            $this->issue_id = null;
            return;
        }
        $this->issue_id = $issue_id;
    }

    public function getSprintsProperty()
    {
        return $this->project->sprints()->backlog(false)->get();
    }

    public function getBacklogProperty()
    {
        return $this->project->sprints()->backlog()->first();
    }

    public function render()
    {
        return view('livewire.projects.backlog');
    }
}
