@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ __('panel.users.create_user') }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('users.create') }}
    </x-slot>
</x-page-header>

<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <x-adminlte-card>
            <livewire:users.form />
        </x-adminlte-card>
    </div>
</div>

@endsection
