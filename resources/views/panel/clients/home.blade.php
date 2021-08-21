@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ __('panel.clients.clients') }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('clients.home') }}
    </x-slot>
</x-page-header>

<x-adminlte-card>

    <div class="text-right mb-2">
        <x-primary-button-link
            icon="fa fa-edit"
            label="panel.clients.create_client"
            route="clients.create"
        />
    </div>

    <livewire:clients.home />

</x-adminlte-card>
@endsection
