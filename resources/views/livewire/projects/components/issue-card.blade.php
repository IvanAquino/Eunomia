<div class="issue-card__component">

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
        <div class="title rounded" wire:click="showIssueNameInput">
            {{ $issue->name }}
        </div>
    @endif
    
    
</div>

<script>
    window.addEventListener('set_focus_on_issue_name_input', function () {
        document.querySelector('#card_issue_name').focus();
    });
</script>
