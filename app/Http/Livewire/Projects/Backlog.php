<?php

namespace App\Http\Livewire\Projects;

use App\Http\Livewire\Projects\Traits\SprintFunctions;
use Livewire\Component;

class Backlog extends Component
{
    use SprintFunctions;

    public $project;

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
