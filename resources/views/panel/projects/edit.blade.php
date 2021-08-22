@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ __('panel.projects.create_project') }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('projects.edit', $project) }}
    </x-slot>
</x-page-header>

<div class="row">
    <div class="col-sm-6 offset-3">
        <x-adminlte-card>
            <livewire:projects.form :model="$project" />
        </x-adminlte-card>
    </div>
</div>

@endsection
