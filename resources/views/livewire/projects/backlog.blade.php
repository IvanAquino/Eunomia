<div>

    {{-- List of sprints --}}

    @foreach ($this->sprints as $sprint)
        @livewire(
            'projects.components.sprint',
            ['sprint' => $sprint],
            key($sprint->id)
        )
    @endforeach

    {{-- Backlog sprint --}}
    
    <div class="mt-4 mb-2 text-right">
        <x-adminlte-button
            label="{{ __('panel.sprints.create_sprint') }}"
            class="bg-purple btn-sm"
            wire:click="createSprint"
        />
    </div>

    @livewire('projects.components.sprint', ['sprint' => $this->backlog], key($this->backlog->id))

</div>
