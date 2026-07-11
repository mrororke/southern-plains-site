@extends('layouts.portal')

@section('title', 'Edit Category')

@section('content')

<div class="p-6">

    <div class="flex items-center justify-between mb-6">

        <h1 class="font-heading text-4xl pb-2">
            Edit Category
        </h1>

        <button
            type="button"
            onclick="confirmDeleteCategory()"
            class="bg-red-600 text-white inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150">

            Delete Category

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
        action="{{ route('admin.teaching-library.categories.update', $category) }}">

        @csrf
        @method('PUT')

        @include('admin.teaching-library.categories.partials.form')

    </form>

</div>

<form
    id="delete-category-form"
    method="POST"
    action="{{ route('admin.teaching-library.categories.destroy', $category) }}"
    class="hidden">

    @csrf
    @method('DELETE')

</form>

@push('scripts')

<script>

function confirmDeleteCategory() {

    if (!confirm('Are you sure you want to delete this category?')) {
        return;
    }

    document.getElementById('delete-category-form').submit();

}

window.confirmDeleteCategory = confirmDeleteCategory;

</script>

@endpush

@endsection