@extends('layouts.portal')

@section('title', 'Create Category')

@section('content')

<div class="p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold">
            Create Category
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
        action="{{ route('admin.teaching-library.categories.store') }}">

        @csrf


        <div class="border p-4 space-y-4">


            <div>

                <label class="text-sm font-semibold">
                    Name
                </label>

                <input
                    name="name"
                    value="{{ old('name') }}"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training"
                    required>

            </div>


            <div>

                <label class="text-sm font-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">{{ old('description') }}</textarea>

            </div>


        </div>


        <div class="mt-6">

            <button
                class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">

                Save Category

            </button>

        </div>


    </form>

</div>

@endsection