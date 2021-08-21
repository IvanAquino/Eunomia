@extends('adminlte::page')

@section('content')
<x-page-header>
    <x-slot name="title">
        {{ __('panel.general.home') }}
    </x-slot>
    <x-slot name="right">
        {{ Breadcrumbs::render('home') }}
    </x-slot>
</x-page-header>
@endsection
