@extends('admin.dashboard-v2.desktop')

@section('title', 'Edit Event')

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
        title="Edit Event"
        :description="$event->title"
    />

    <x-admin.forms.validation-summary />

    <form
        method="POST"
        action="{{ route('admin.events-v2.update', $event) }}"
        enctype="multipart/form-data"
        class="space-y-8"
    >
        @csrf
        @method('PUT')

        @include(
            'admin.dashboard-v2.events.components.form',
            ['event' => $event]
        )

    </form>

</div>

@endsection