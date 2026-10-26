@extends('admin.dashboard-v2.desktop')

@section('title', 'Create Event')

@section('content')

<div class="dashboard-content">

    <div class="py-4">
        <img
            src="{{ asset('images/headers/header-events.jpg') }}"
            alt="Southern Plains Sport Dog Club events."
            class="rounded-md"
        >
    </div>

    <x-admin.layout.page-header
        title="Create Event"
        description="Add a new event to the Events library."
    />

    <x-admin.forms.validation-summary />

    <form
        method="POST"
        action="{{ route('admin.events-v2.store') }}"
        enctype="multipart/form-data"
        class="space-y-8"
    >
        @csrf

        @include(
            'admin.dashboard-v2.events.components.form'
        )

    </form>

</div>

@endsection