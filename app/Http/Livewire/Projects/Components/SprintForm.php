<?php

namespace App\Http\Livewire\Projects\Components;

use App\Models\Sprint;
use Livewire\Component;

class SprintForm extends Component
{
    public $sprint;
    public $sprint_form = [
        'name' => '',
        'starts_at' => null,
        'ends_at' => null,
        'sprint_goal' => '',
    ];

    public function mount($id)
    {
        $this->sprint = Sprint::find($id);
        $this->sprint_form['name'] = $this->sprint->name;
        $this->sprint_form['sprint_goal'] = $this->sprint->sprint_goal;
        if ($this->sprint->starts_at) {
            $this->sprint_form['starts_at'] = $this->sprint->starts_at->format('Y-m-d');
        }
        if ($this->sprint->ends_at) {
            $this->sprint_form['ends_at'] = $this->sprint->ends_at->format('Y-m-d');
        }
    }

    public function saveSprint()
    {
        $this->sprint->update($this->sprint_form);
        $this->alert('success', __('panel.sprints.sprint_saved_success'));
        $this->dispatchBrowserEvent('hide_edit_sprint_modal');
    }

    public function render()
    {
        return view('livewire.projects.components.sprint-form');
    }
}
