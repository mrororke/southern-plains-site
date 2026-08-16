@extends('layouts.portal')

@section('sidebar')

    <x-portal.sidebar-section title="Instructor">

        <x-portal.sidebar-link
            label="Trick Catalog"
            :route="route('admin.trick-catalog.index')" />

        <x-portal.sidebar-link
            label="Create Trick"
            :route="route('admin.trick-catalog.create')" />

    </x-portal.sidebar-section>

@endsection