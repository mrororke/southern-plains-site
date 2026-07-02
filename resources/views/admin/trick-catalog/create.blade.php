@extends('layouts.portal')

@section('title', 'Create Trick')

@section('content')

<div class="max-w-4xl">

    <form method="POST" action="{{ route('admin.trick-catalog.store') }}">
        @csrf

        {{-- TRICK INFO --}}
        <div class="bg-white p-4 rounded shadow space-y-4 mb-6">

            <h2 class="font-semibold text-lg">Create Trick</h2>

            <div>
                <label class="text-sm font-semibold">Name</label>
                <input name="name"
                    class="w-full border p-2 rounded"
                    required>
            </div>

            <div>
                <label class="text-sm font-semibold">Levels</label>

                <select name="levels[]" multiple class="w-full border p-2 rounded">
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">
                            {{ $level->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm font-semibold">Notes</label>
                <textarea name="notes"
                    class="w-full border p-2 rounded"></textarea>
            </div>

        </div>

        {{-- VIDEOS --}}
        <div class="bg-white p-4 rounded shadow">

            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-lg">Videos</h2>

                <button type="button"
                    id="add-video-btn"
                    class="bg-black text-white px-3 py-1 rounded text-sm">
                    + Add Video
                </button>
            </div>

            <div id="video-container" class="space-y-3"></div>

        </div>

        {{-- SUBMIT --}}
        <div class="mt-6">
            <button class="bg-green-600 text-white px-5 py-2 rounded">
                Save Trick
            </button>
        </div>

    </form>

</div>

@endsection