<div class="sprint mb-2">
    <div class="mb-2">
        {{ $sprint->name }}
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
            name="issue_name"
            class="form-control-sm"
            placeholder="{{ __('panel.issues.placeholder') }}"
            wire:model="new_issue"
            wire:keydown.enter="createIssue($event.target.value)"
            wire:keydown.escape="hideInputIssue"
            autofocus
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