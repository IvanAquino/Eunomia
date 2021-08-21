<form wire:submit.prevent="saveUser">
    <x-livewire-input
        label="panel.general.name"
        identifier="name"
        model="user.name"
    />

    <x-livewire-input
        label="panel.general.last_name"
        identifier="last_name"
        model="user.last_name"
    />

    <x-livewire-input
        type="email"
        label="panel.general.email"
        identifier="email"
        model="user.email"
    />

    <x-livewire-input
        type="password"
        label="panel.general.password"
        identifier="password"
        model="user.password"
    />

    <x-livewire-select
        label="panel.roles.role"
        identifier="organizador"
        model="role"
    >
        <option value="">-- {{ __('panel.roles.select_role') }} --</option>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}">{{ $role->display_name }}</option>
        @endforeach
    </x-livewire-select>

    <div class="form-group text-right">
        <x-adminlte-button
            type="submit"
            label="{{ __('panel.users.save_user') }}"
            class="bg-purple"
            icon="fas fa-lg fa-save"
        />
    </div>
</form>