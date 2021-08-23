<div class="issue-card__component p-1">

    <div class="pl-2 text-muted">
        {{ $issue->code }}
    </div>

    @if ($show_issue_name_input)
        <input
            id="card_issue_name"
            type="text"
            class="form-control"
            wire:model="issue_name"
            wire:keydown.enter="updateIssueName"
            wire:keydown.escape="hideIssueNameInput"
        >
    @else
        <div class="box-like-input rounded" wire:click="showIssueNameInput">
            {{ $issue->name }}
        </div>
    @endif

    <div class="mt-4 font-weight-bold text-center mb-4">
        {{ __('panel.general.details') }}
    </div>

    {{-- Sprint --}}
    <div class="form-group row">
        <label for="reporter" class="col-3 col-form-label">
            {{ __('panel.sprints.sprint') }}
        </label>
        <div class="col-9">
            <select id="sprint-selector" class="form-control" wire:model="sprint_id" wire:change="changeSprint">
                @foreach ($this->sprints as $sprint)
                    <option value="{{ $sprint->id }}">{{ $sprint->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    {{-- Reporter --}}
    <div class="form-group row">
        <label for="reporter" class="col-3 col-form-label">
            {{ __('panel.issues.reporter') }}
        </label>
        <div class="col-9">
            <select id="sprint-selector" class="form-control" wire:model="reported_by" wire:change="changeReportedBy">
                @foreach ($this->users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    
</div>

<script>
    window.addEventListener('set_focus_on_issue_name_input', function () {
        document.querySelector('#card_issue_name').focus();
    });
</script>
