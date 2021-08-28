<div class="sprint mb-4">
    <div class="mb-2 title-row">
        <div class="title">
            {{ $sprint->name }}
        </div>
        <div>
            @if (!$sprint->is_backlog)
                <x-adminlte-button
                    class="btn-sm bg-purple"
                    label="{{ __('panel.sprints.start_sprint') }}"
                    :disabled="!$can_start_sprint"
                />
            @endif
        </div>
        <div>
            @if (!$sprint->is_backlog)
            <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" wire:click="$emit('showEditSprintModal', {{ $sprint->id }})">
                        {{ __('panel.general.edit') }}
                    </a>
                    <a class="dropdown-item" href="#" wire:click.prevent="confirmDeleteSprint">{{ __('panel.general.delete') }}</a>
                </div>
            </div>
            @endif
        </div>
    </div>

    @foreach ($this->issues as $issue)
        @livewire(
            'projects.components.issue-row',
            ['issue' => $issue],
            key($issue->id)
        )
    @endforeach

    @if ($show_input_issue)
        <x-adminlte-input
            id="sprint_issue_name_{{ $sprint->id }}"
            name="issue_name"
            class="form-control-sm"
            placeholder="{{ __('panel.issues.placeholder') }}"
            wire:model="new_issue"
            wire:keydown.enter="createIssue($event.target.value)"
            wire:keydown.escape="hideInputIssue"
        />
    @else
        <x-adminlte-button
            label="{{ __('panel.issues.create_issue') }}"
            class="btn-sm btn-block text-left"
            icon="fa fa-plus"
            wire:click="showInputIssue"
        />
    @endif
</div>

@push('js')
<script>
    window.addEventListener('show_input_issue_{{ $sprint->id }}', function () {
        document.querySelector('#sprint_issue_name_{{ $sprint->id }}').focus();
    })
</script>
@endpush