@extends('layouts.portal')

@section('title', 'Create Resource')

@section('content')

<div class="max-w-4xl">

    <form method="POST"
        action="{{ route('admin.teaching-library.resources.store') }}">

        @csrf

        <div class="bg-white p-4 shadow space-y-4">

            <h1 class="font-heading text-4xl pb-2">
                Create Resource
            </h1>

            @include('admin.teaching-library.resources.partials.form')

        </div>

        <div class="mt-6">
            <button
                class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">

                Save Resource

            </button>
        </div>

    </form>

</div>

@endsection