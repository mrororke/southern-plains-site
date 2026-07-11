@extends('layouts.portal')

@section('title', 'Edit Category')

@section('content')

<div class="p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold">
            Edit Category
        </h1>
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
                class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-club hover:bg-club-hover text-white">

                Save Changes

            </button>

        </div>

    </form>

</div>

@endsection