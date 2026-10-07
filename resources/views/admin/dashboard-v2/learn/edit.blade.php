@extends('admin.dashboard-v2.desktop')

@section('title', 'Edit Article')

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
        title="Edit Article"
        description="Update this Learn article."
    />

    <x-admin.forms.validation-summary />

    <form
        method="POST"
        action="{{ route('admin.learn.update', $article) }}"
        enctype="multipart/form-data"
        class="space-y-8"
    >
        @csrf
        @method('PUT')

        @include(
            'admin.dashboard-v2.learn.components.form'
        )

    </form>

</div>

@endsection