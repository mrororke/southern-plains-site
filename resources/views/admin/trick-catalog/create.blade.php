@vite('resources/js/admin/trick-catalog/create.js')
@extends('layouts.portal')

@section('title', 'Create Trick')

@section('content')

<div class="max-w-4xl">

    <form method="POST" action="{{ route('admin.trick-catalog.store') }}">
        @csrf

        {{-- TRICK INFO --}}
        <div class="bg-white p-4 rounded shadow space-y-4 mb-6">

            <h2 class="font-heading text-4xl pb-2">Create Behavior</h2>

            <div>
                <label class="text-sm font-semibold">Name</label>
                <input name="name"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-club focus:ring-club"
                    required>
            </div>

            <div>
                <label class="text-sm font-semibold">Categories</label>

                <select name="levels[]" multiple class="mt-1 block w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">
                    @foreach($levels as $level)
                    <option value="{{ $level->id }}">
                        {{ ucwords(str_replace('_', ' ', $level->name)) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <div
    id="notes-editor"
    data-value="{{ old('notes') }}"
></div>
            </div>

        </div>

        {{-- VIDEOS --}}
        <div class="bg-white p-4 rounded shadow">

            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-lg">Videos</h2>

                <button type="button"
                    id="add-video-btn"
                    class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-club hover:bg-club-hover text-white  ms-4">
                    + Add Video
                </button>
            </div>

            <div id="video-container" class="space-y-3"></div>

        </div>

        {{-- SUBMIT --}}
        <div class="mt-6">
            <button class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-club hover:bg-club-hover text-white  ms-4">
                Save Behavior
            </button>
        </div>

    </form>

</div>

@endsection