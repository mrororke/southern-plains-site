@extends('layouts.portal')

@section('title', 'Edit Resource')

@section('content')

<div class="max-w-6xl">

    <div class="flex items-center justify-between mb-6">

        <h1 class="font-heading text-4xl pb-2">
            Edit Resource
        </h1>

        <button
            type="button"
            onclick="confirmDeleteResource()"
            class="bg-red-600 text-white inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150">

            Delete Resource

        </button>

    </div>


    @if($errors->any())

        <div class="border p-4 mb-6 text-sm">

            <ul class="list-disc list-inside">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.teaching-library.resources.update', $resource) }}">

        @csrf
        @method('PUT')

        @include(
            'admin.teaching-library.resources.partials.form',
            [
                'resource' => $resource,
                'categories' => $categories
            ]
        )

    </form>

</div>


<form
    id="delete-resource-form"
    method="POST"
    action="{{ route('admin.teaching-library.resources.destroy', $resource) }}"
    class="hidden">

    @csrf
    @method('DELETE')

</form>


@push('scripts')

<script>

function confirmDeleteResource() {

    if (!confirm('Are you sure you want to delete this resource?')) {
        return;
    }

    document.getElementById('delete-resource-form').submit();

}

window.confirmDeleteResource = confirmDeleteResource;

</script>

@endpush

@endsection