<form wire:submit.prevent="saveProject" autocomplete="off">

    <x-livewire-input
        label="panel.general.name"
        identifier="name"
        model="project.name"
    />

    <x-livewire-input
        label="panel.general.code"
        identifier="code"
        model="project.code"
    />

    <x-livewire-select
        label="panel.clients.client"
        identifier="client"
        model="project.client_id"
    >
        <option value="">-- {{ __('panel.clients.select_client') }} --</option>
        @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
        <x-slot name="help">
            {{ __('panel.clients.cant_find_client') }},
            <a href="{{ route('clients.create') }}" class="text-purple">
                {{ __('panel.general.create_one') }}
            </a>
        </x-slot>
    </x-livewire-select>

    <div class="form-group text-right">
        <x-adminlte-button
            type="submit"
            label="{{ __('panel.projects.save_project') }}"
            class="bg-purple"
            icon="fas fa-lg fa-save"
        />
    </div>

</form>