@extends('admin.dashboard-v2.desktop')

@section('title', 'Create Article')

@section('content')

<div class="dashboard-content">

    <div class="py-4">
        <img
            src="{{ asset('images/headers/header-learn.jpg') }}"
            alt="Hamish, a Shetland Sheepdog, in a field of wildflowers."
            class="rounded-md"
        >
    </div>

    <x-admin.layout.page-header
        title="Create Article"
        description="Add a new article to Learn."
    />

    <x-admin.forms.validation-summary />

    <form
        method="POST"
        action="{{ route('admin.learn.store') }}"
        class="space-y-8"
    >
        @csrf

        @include(
            'admin.dashboard-v2.learn.components.form'
        )

    </form>

</div>

@endsection