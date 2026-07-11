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

    <form method="POST"
          action="{{ route('admin.teaching-library.categories.update', $category) }}">

        @csrf
        @method('PUT')

        <div class="border p-4 space-y-4">

            <div>

                <label class="text-sm font-semibold">
                    Name
                </label>

                <input
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-club focus:ring-club"
                    required>

            </div>

            <div>

                <label class="text-sm font-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">{{ old('description', $category->description) }}</textarea>

            </div>

        </div>

        <div class="mt-6 flex gap-2">

            <button
                class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-club-hover text-white">

                Save Changes

            </button>

        </div>

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

@endsection

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