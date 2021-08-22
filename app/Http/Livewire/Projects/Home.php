<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deleteProjectConfirmed',
        'deleteProjectCancelled',
    ];

    public $project_id;

    public function askIfWantToDeleteProject($id)
    {
        $this->project_id = $id;
        $this->confirm(__('panel.projects.ask_delete_project'), [
            'onConfirmed' => 'deleteProjectConfirmed',
            'onCancelled' => 'deleteProjectCancelled',
        ]);
    }
    
    public function deleteProjectConfirmed() {
        $project = Project::find($this->project_id);
        if ($project) {
            $project->delete();
            $this->alert('success', __('panel.projects.project_deleted_success'));
        }
        $this->project_id = null;
        $this->resetPage();
    }

    public function deleteProjectCancelled() {
        $this->project_id = null;
    }

    public function render()
    {
        $projects = Project::orderBy('name', 'asc')->paginate(15);

        return view('livewire.projects.home', [
            'projects' => $projects,
        ]);
    }
}
