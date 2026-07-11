@extends('layouts.portal')

@section('title', 'Create Tag')

@section('content')

<div class="p-6">

    <div class="mb-6">
        <h1 class="font-heading text-4xl pb-2">
            Create Tag
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

    <form
        method="POST"
        action="{{ route('admin.teaching-library.tags.store') }}">

        @csrf

        @include('admin.teaching-library.tags.partials.form')

    </form>

</div>

@endsection