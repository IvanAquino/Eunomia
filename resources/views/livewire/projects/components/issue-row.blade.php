<div class="bg-white border rounded px-2 py-1 mb-2 issue__row" wire:click="$emit('showIssueCard', {{ $issue->id }})">
    <span class="text-muted">{{ $issue->code }}</span>
    {{ $issue->name }}
</div>
