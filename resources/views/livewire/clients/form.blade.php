<form wire:submit.prevent="saveClient">

    <x-livewire-input
        label="panel.general.name"
        identifier="name"
        model="client.name"
    />

    <x-livewire-input
        type="email"
        label="panel.general.email"
        identifier="email"
        model="client.email"
    />

    <x-livewire-input
        label="panel.general.phone_number"
        identifier="phone_number"
        model="client.phone_number"
    />

    <div class="form-group text-right">
        <x-adminlte-button
            type="submit"
            label="{{ __('panel.clients.save_client') }}"
            class="bg-purple"
            icon="fas fa-lg fa-save"
        />
    </div>

</form>