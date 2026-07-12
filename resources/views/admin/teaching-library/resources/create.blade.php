@vite('resources/js/app.js')

@extends('layouts.portal')

@section('title', 'Create Resource')

@section('content')

<div class="max-w-6xl">

    <form method="POST"
        action="{{ route('admin.teaching-library.resources.store') }}">

        @csrf

        <div class="bg-white p-4 shadow space-y-4">

            <h1 class="font-heading text-4xl pb-2">
                Create Resource
            </h1>

            @include('admin.teaching-library.resources.partials.form',
            [
                'resource' => new \App\Models\TeachingLibrary\Resource(),
                'categories' => $categories
            ]
            )

        </div>

        

    </form>

</div>

@endsection