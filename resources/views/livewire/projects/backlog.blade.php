<div class="backlog__container">

    <div class="backlog__issues-column">
        {{-- List of sprints --}}

        @foreach ($this->sprints as $sprint)
            @livewire(
                'projects.components.sprint',
                ['sprint' => $sprint, 'can_start_sprint' => $loop->first],
                key($sprint->id)
            )
        @endforeach

        {{-- Backlog sprint --}}

        <div class="mt-4 mb-2 text-right">
            <x-adminlte-button
                label="{{ __('panel.sprints.create_sprint') }}"
                class="bg-secondary btn-sm"
                wire:click="createSprint"
            />
        </div>

        @livewire('projects.components.sprint', ['sprint' => $this->backlog], key($this->backlog->id))
    </div>

    <div class="backlog__issues-right-column">
        @if ($issue_id)
        <div class="bg-white border rounded issue__card">
            <livewire:projects.components.issue-card :id="$issue_id" :key="$issue_id" />
        </div>
        @endif
    </div>

</div>
