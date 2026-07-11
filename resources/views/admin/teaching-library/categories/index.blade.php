@extends('layouts.portal')

@section('title', 'Teaching Library Categories')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-2xl font-bold">
                Teaching Library Categories
            </h1>

            <p class="text-sm text-gray-600 mt-1">
                Manage categories used to organize teaching resources.
            </p>
        </div>

        <a href="{{ route('teaching-library.categories.create') }}"
            class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-club hover:bg-club-hover text-white">
            Add Category
        </a>

    </div>


    @if(session('success'))

    <div class="border p-3 mb-6 text-sm">
        {{ session('success') }}
    </div>

    @endif


    <div class="space-y-3">

        @forelse($categories as $category)

        <div class="border p-4">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="font-semibold">
                        {{ $category->name }}
                    </h2>

                    @if($category->description)

                    <p class="text-sm text-gray-600 mt-1">
                        {{ $category->description }}
                    </p>

                    @endif

                </div>


                <div class="text-right text-xs">

                    <a href="{{ route('teaching-library.categories.edit', $category) }}"
                        class="border px-3 py-1">
                        Edit
                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="border p-4 text-sm text-gray-600">
            No categories have been created yet.
        </div>

        @endforelse

    </div>

</div>

@endsection