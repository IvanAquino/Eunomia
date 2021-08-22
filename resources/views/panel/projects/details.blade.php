@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ $project->code }} - {{ $project->name }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('projects.details', $project) }}
    </x-slot>
</x-page-header>

<livewire:projects.backlog :project="$project" />

@endsection
