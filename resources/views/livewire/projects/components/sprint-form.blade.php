<form wire:submit.prevent="saveSprint">
    <x-livewire-input
        label="panel.general.name"
        identifier="name"
        model="sprint_form.name"
    />

    <x-livewire-input
        type="date"
        label="panel.general.start_date"
        identifier="start_date"
        model="sprint_form.starts_at"
    />

    <x-livewire-input
        type="date"
        label="panel.general.end_date"
        identifier="end_date"
        model="sprint_form.ends_at"
    />

    <x-livewire-textarea
        label="panel.sprints.sprint_goal"
        identifier="sprint_goal"
        model="sprint_form.sprint_goal"
    />

    <div class="text-right">
        <x-adminlte-button
            type="submit"
            label="{{ __('panel.projects.save_project') }}"
            class="bg-purple"
            icon="fas fa-lg fa-save"
        />
    </div>

    <x-slot name="footerSlot">
        &nbsp;
    </x-slot>
</form>