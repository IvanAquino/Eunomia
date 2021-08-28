<?php

namespace App\Http\Livewire\Projects\Components;

use Livewire\Component;
use Livewire\WithPagination;

class Sprint extends Component
{
    use WithPagination;

    public $sprint;
    public $show_input_issue = false;
    public $new_issue = '';
    public $can_start_sprint;

    protected function getListeners()
    {
        return [
            'refreshSprint',
            "deleteSprintConfirmed_{$this->sprint->id}" => "deleteSprintConfirmed",
            "deleteSprintCancelled_{$this->sprint->id}" => "deleteSprintCancelled",
        ];
    }

    public function getIssuesProperty()
    {
        return $this->sprint->issues()->get();
    }

    public function refreshSprint()
    {
        $this->resetPage();
    }

    public function showInputIssue()
    {
        $this->dispatchBrowserEvent("show_input_issue_{$this->sprint->id}");
        $this->show_input_issue = true;
    }

    public function hideInputIssue()
    {
        $this->show_input_issue = false;
        $this->reset('new_issue');
    }

    public function createIssue($name) {
        $user = auth()->user();
        $code = $this->sprint->project->code;
        $count = $this->sprint->project->issues()->count() + 1;

        $this->sprint->issues()->create([
            'code' => "{$code}-{$count}",
            'name' => $name,
            'reported_by' => $user->id,
        ]);

        $this->hideInputIssue();
    }

    public function confirmDeleteSprint()
    {
        $this->confirm(__('panel.sprints.ask_delete_sprint'), [
            'onConfirmed' => "deleteSprintConfirmed_{$this->sprint->id}",
            'onCancelled' => "deleteSprintCancelled_{$this->sprint->id}",
        ]);
    }

    public function deleteSprintConfirmed()
    {
        if ($this->sprint->issues()->count() > 0) {
            $project = $this->sprint->project;
            $sprints = $project
                ->sprints()
                ->where('id', '!=', $this->sprint->id)
                ->backlog(false)
                ->orderBy('id', 'asc')
                ->get();

            if ($sprints->count() == 0) {
                $closer_sprint = $project->sprints()->backlog()->first();
            }
            else {
                $closer_sprint = $sprints->where('id', '>', $this->sprint->id)->first();
                if (!$closer_sprint) {
                    $closer_sprint = $sprints->where('id', '<', $this->sprint->id)->first();
                }
            }
            $this->sprint->issues()->update([
                'sprint_id' => $closer_sprint->id,
            ]);
        }
        $this->sprint->delete();
        $this->alert('success', __('panel.sprints.sprint_deleted_success'));
        $this->emit('refreshSprint');
        $this->emit('refreshBacklog');
    }

    public function deleteSprintCancelled()
    {}

    public function render()
    {
        return view('livewire.projects.components.sprint');
    }
}
