<?php

namespace App\Http\Livewire\Projects;

use App\Models\Client;
use App\Models\Project;
use App\Utils\Acronym;
use Livewire\Component;

class Form extends Component
{
    protected $rules = [
        'project.name'      => 'required',
        'project.code'      => 'required',
        'project.client_id' => 'required',
    ];

    public $model;
    public $project = [
        'name',
        'code',
        'client_id',
    ];

    public function mount()
    {
        if ($this->model) {
            $this->project = [
                'name'      => $this->model->name,
                'code'      => $this->model->code,
                'client_id' => $this->model->client_id,
            ];
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function updatedProjectName($value)
    {
        $this->project['code'] = Acronym::forProject($value);
    }

    public function saveProject()
    {
        $this->validate();

        if (!$this->model) {
            $project = Project::create($this->project);
            $project->sprints()->create([
                'name' => __('panel.general.backlog'),
                'is_backlog' => true,
            ]);
        } else {
            $this->model->update($this->project);
        }

        $this->flash('success', __('panel.projects.project_saved'));
        redirect()->route('projects.home');
    }

    public function render()
    {
        $clients = Client::orderBy('name', 'asc')->get();

        return view('livewire.projects.form', [
            'clients' => $clients, 
        ]);
    }
}
