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

    <!-- Sprint edit modal -->
    <div class="modal fade" id="edit-sprint-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('panel.sprints.edit_sprint') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    @if (!!$sprint_edit_id)
                        @livewire(
                            'projects.components.sprint-form',
                            ['id' => $sprint_edit_id],
                            key('form_' . $sprint_edit_id)
                        )
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@push('js')
<script>
    window.addEventListener('show_edit_sprint_modal', function () {
        $('#edit-sprint-modal').modal('show');
    });
    window.addEventListener('hide_edit_sprint_modal', function () {
        $('#edit-sprint-modal').modal('hide');
    });
</script>  
@endpush