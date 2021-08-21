@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ __('panel.clients.create_client') }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('clients.edit', $client) }}
    </x-slot>
</x-page-header>

<div class="row">
    <div class="col-sm-6 offset-3">
        <x-adminlte-card>
            <livewire:clients.form :model="$client" />
        </x-adminlte-card>
    </div>
</div>

@endsection
