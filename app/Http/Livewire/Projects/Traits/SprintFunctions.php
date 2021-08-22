<?php
namespace App\Http\Livewire\Projects\Traits;

trait SprintFunctions {

    public function createSprint()
    {
        $next_sprint_name = $this->generateNextSprintName();
        
        $this->project->sprints()->create([
            'name' => $next_sprint_name,
        ]);
    }

    private function generateNextSprintName()
    {
        $sprints = $this->project->sprints()->backlog(false)->get();

        return __('panel.sprints.sprint_x_number', [
            'number' =>  $sprints->count() + 1,
        ]);
    }

}