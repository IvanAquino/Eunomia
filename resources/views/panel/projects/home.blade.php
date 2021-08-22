@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ __('panel.projects.projects') }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('projects.home') }}
    </x-slot>
</x-page-header>

<x-adminlte-card>

    <div class="text-right mb-2">
        <x-primary-button-link
            icon="fa fa-edit"
            label="panel.projects.create_project"
            route="projects.create"
        />
    </div>

    <livewire:projects.home />

</x-adminlte-card>
@endsection
