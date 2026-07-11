@extends('layouts.portal')

@section('title', 'Teaching Library Audiences')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="font-heading text-4xl pb-2">
                Teaching Library Audiences
            </h1>

            <p class="text-sm text-gray-600 mt-1">
                Manage audiences used to organize teaching resources.
            </p>
        </div>

        <a href="{{ route('admin.teaching-library.audiences.create') }}"
            class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">
            + Add Audience
        </a>

    </div>


    @if(session('success'))

    <div class="border p-3 mb-6 text-sm">
        {{ session('success') }}
    </div>

    @endif


    <div class="space-y-3">

        @forelse($audiences as $audience)

        <div class="border p-4">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="font-semibold">
                        {{ $audience->name }}
                    </h2>

                    @if($audience->description)

                    <p class="text-sm text-gray-600 mt-1">
                        {{ $audience->description }}
                    </p>

                    @endif

                </div>


                <div class="text-right text-xs">

                    <a href="{{ route('admin.teaching-library.audiences.edit', $category) }}"
                        class="inline-flex items-center px-3 py-1 text-xs bg-league text-white">
                        Edit
                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="border p-4 text-sm text-gray-600">
            No audiences have been created yet.
        </div>

        @endforelse

    </div>

</div>

@endsection