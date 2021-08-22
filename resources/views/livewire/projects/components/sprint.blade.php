<div class="sprint mb-2">
    <div class="mb-2">
        {{ $sprint->name }}
    </div>

    @if ($show_input_ticket)
        <x-adminlte-input
            name="ticket_name"
            class="form-control-sm"
            placeholder="{{ __('panel.tickets.placeholder') }}"
            wire:model="new_ticket"
            wire:keydown.enter="createTicket($event.target.value)"
            wire:keydown.escape="hideInputTicket"
            autofocus
        />
    @else
        <x-adminlte-button
            label="{{ __('panel.sprints.create_sprint') }}"
            class="bg-white btn-sm btn-block text-left"
            icon="fa fa-plus"
            wire:click="showInputTicket"
        />
    @endif
</div>