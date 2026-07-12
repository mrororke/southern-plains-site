@extends('layouts.portal')

@section('title', 'Edit Resource')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="font-heading text-4xl pb-2">
                Edit Resource
            </h1>

            <p class="text-sm text-gray-600 mt-1">
                Update this teaching library resource.
            </p>
        </div>

    </div>


    <form method="POST"
        action="{{ route('admin.teaching-library.resources.update', $resource) }}">

        @csrf
        @method('PUT')


        @include(
            'admin.teaching-library.resources.partials.form',
            [
                'resource' => $resource
            ]
        )


        <div class="mt-6">

            <button
                type="submit"
                class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">

                Update Resource

            </button>

        </div>

    </form>

</div>

@endsection