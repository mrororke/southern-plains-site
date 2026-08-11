@extends('admin.dashboard-v2.desktop')

@section('title', 'Create Resource')

@section('content')

<div class="dashboard-content">

    <div class="py-4">
        <img
            src="{{ asset('images/headers/resourceLibrary.jpg') }}"
            alt="Hamish, a Shetland Sheepdog, looking at the camera."
            class="rounded-md"
        >
    </div>

    <x-admin.layout.page-header
        title="Create Resource"
        description="Add a new Resource to the Resource Library."
    />

    <form
        method="POST"
        action="{{ route('admin-v2.resource-library.store') }}"
        class="space-y-8"
    >
        @csrf

        @include(
            'admin.dashboard-v2.resource-library.components.form'
        )

    </form>

</div>

@endsection