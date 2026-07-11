@extends('layouts.portal')

@section('title', 'Edit Tag')

@section('content')

<div class="p-6">

    <div class="flex items-center justify-between mb-6">

        <h1 class="font-heading text-4xl pb-2">
            Edit Tag
        </h1>

        <button
            type="button"
            onclick="confirmDeleteTag()"
            class="bg-red-600 text-white inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150">

            Delete Tag

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
        action="{{ route('admin.teaching-library.tags.update', $tag) }}">

        @csrf
        @method('PUT')

        @include('admin.teaching-library.tags.partials.form')

    </form>

</div>

<form
    id="delete-tag-form"
    method="POST"
    action="{{ route('admin.teaching-library.tags.destroy', $tag) }}"
    class="hidden">

    @csrf
    @method('DELETE')

</form>

@push('scripts')

<script>

function confirmDeleteTag() {

    if (!confirm('Are you sure you want to delete this tag?')) {
        return;
    }

    document.getElementById('delete-tag-form').submit();

}

window.confirmDeleteTag = confirmDeleteTag;

</script>

@endpush

@endsection