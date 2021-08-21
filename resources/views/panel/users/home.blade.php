@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ __('panel.users.users') }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('users.home') }}
    </x-slot>
</x-page-header>

<x-adminlte-card>

    <div class="text-right mb-2">
        <x-primary-button-link
            icon="fa fa-edit"
            label="panel.users.create_user"
            route="users.create"
        />
    </div>

    <livewire:users.home />

</x-adminlte-card>
@endsection
