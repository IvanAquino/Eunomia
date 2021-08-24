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
        <label for="sprint-selector" class="col-5 col-form-label col-form-label-sm">
            {{ __('panel.sprints.sprint') }}
        </label>
        <div class="col-7">
            <select id="sprint-selector" class="form-control form-control-sm" wire:model="sprint_id" wire:change="changeSprint">
                @foreach ($this->sprints as $sprint)
                    <option value="{{ $sprint->id }}">{{ $sprint->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    {{-- Reporter --}}
    <div class="form-group row">
        <label for="reporter" class="col-5 col-form-label col-form-label-sm">
            {{ __('panel.issues.reporter') }}
        </label>
        <div class="col-7">
            <select id="reporter" class="form-control form-control-sm" wire:model="reported_by" wire:change="changeReportedBy">
                @foreach ($this->users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Assignee --}}
    <div class="form-group row">
        <label for="assignee" class="col-5 col-form-label col-form-label-sm">
            {{ __('panel.issues.assignee') }}
        </label>
        <div class="col-7">
            <select id="assigned_to" class="form-control form-control-sm" wire:model="assigned_to" wire:change="changeAssignee">
                <option value="">-- {{ __('panel.issues.select_assignee') }} --</option>
                @foreach ($this->users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Estimated hours --}}
    <div class="form-group row">
        <label for="estimated_hours" class="col-5 col-form-label col-form-label-sm">
            {{ __('panel.issues.estimated_hours') }}
        </label>
        <div class="col-7">
            @if ($show_estimated_hours)
                <input
                    id="estimated_hours"
                    type="number"
                    class="form-control form-control-sm"
                    step="0.5"
                    wire:model="estimated_hours"
                    wire:keydown.escape="hideEstimatedHoursInput"
                    wire:keydown.enter="updateEstimatedHours"
                >
            @else
                <div class="box-like-input-sm" wire:click="showEstimatedHoursInput">
                    {{ $issue->estimated_hours }}
                </div>
            @endif
        </div>
    </div>

    {{-- Story point --}}
    <div class="form-group row">
        <label for="story_point" class="col-5 col-form-label col-form-label-sm">
            {{ __('panel.issues.story_point') }}
        </label>
        <div class="col-7">
            @if ($show_story_point)
                <input
                    id="story_point"
                    type="number"
                    class="form-control form-control-sm"
                    step="0.5"
                    wire:model="story_point"
                    wire:keydown.escape="hideStoryPointsInput"
                    wire:keydown.enter="updateStoryPoints"
                >
            @else
                <div class="box-like-input-sm" wire:click="showStoryPointsInput">
                    {{ $issue->story_point }}
                </div>
            @endif
        </div>
    </div>
    
    
</div>

<script>
    window.addEventListener('set_focus_on_issue_name_input', function () {
        document.querySelector('#card_issue_name').focus();
        document.querySelector('#card_issue_name').select();
    });
    window.addEventListener('set_focus_on_estimated_hours', function () {
        document.querySelector('#estimated_hours').focus();
        document.querySelector('#estimated_hours').select();
    })
</script>
