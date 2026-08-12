@extends('admin.dashboard-v2.desktop')

@section('title', 'Edit Resource')

@section('content')

<div class="dashboard-content">

    <x-admin.layout.page-header
        title="Edit Resource"
        :description="'Update ' . $resource->title . ' and manage its connections.'"
    />

    <x-admin.forms.validation-summary />

    <form
        method="POST"
        action="{{ route('admin-v2.resource-library.update', $resource) }}"
        class="space-y-8"
    >
        @csrf
        @method('PUT')

        @include(
            'admin.dashboard-v2.resource-library.components.form'
        )

    </form>

</div>

@endsection