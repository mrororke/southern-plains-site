@vite('resources/js/admin/trick-catalog/edit.js')

@extends('layouts.portal')

@section('title', 'Edit Trick')

@section('content')

<div class="max-w-4xl">

    <form method="POST"
        action="{{ route('admin.trick-catalog.update', $trick) }}">

        @csrf
        @method('PUT')

        {{-- TRICK INFO --}}
        <div class="bg-white p-4 shadow space-y-4 mb-6">

            <div class="flex items-center justify-between mb-4">
                <h2 class="font-heading text-4xl pb-2">Edit Trick</h2>

                <button type="button"
                    onclick="confirmDeleteTrick()"
                    class="bg-red-600 text-white inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150">
                    Delete Trick
                </button>
            </div>

            <div>
                <label class="text-sm font-semibold">Name</label>
                <input name="name"
                    value="{{ old('name', $trick->name) }}"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-club focus:ring-club"
                    required>
            </div>

            <div>
                <label class="text-sm font-semibold">Levels</label>

                <select name="levels[]" multiple class="w-full mt-1 block border-gray-300 shadow-sm focus:border-club focus:ring-club">

                    @foreach($levels as $level)
                    <option value="{{ $level->id }}"
                        @selected($trick->levels->contains('id', $level->id))>
                        {{ ucwords(str_replace('_', ' ', $level->name)) }}
                    </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="text-sm font-semibold">Notes</label>
                <textarea name="notes"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">{{ old('notes', $trick->notes) }}</textarea>
            </div>

        </div>

        {{-- VIDEOS --}}
        <div class="bg-white p-4 shadow">

            <div class="flex justify-between mb-4">
                <h2 class="font-bold mb-2">Videos</h2>

                <button type="button"
                    id="add-video-btn"
                    class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-club hover:bg-club-hover text-white  ms-4">
                    + Add Video
                </button>
            </div>

            <div id="video-container" class="space-y-3">

                @foreach($trick->videos as $index => $video)

                @include('admin.trick-catalog.partials.video-row', [
                'index' => $index,
                'videoId' => $video->id,
                'url' => $video->url,
                'creator' => $video->creator,
                'currentPlatform' => $video->platform,
                'isPreferred' => $video->is_preferred,
                ])

                @endforeach

            </div>

        </div>

        <div class="mt-6">
            <button class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-club text-white hover:bg-club-hover  ms-4">
                Save Changes
            </button>
        </div>

    </form>

</div>

<form id="delete-form"
    method="POST"
    action="{{ route('admin.trick-catalog.destroy', $trick) }}"
    class="hidden">

    @csrf
    @method('DELETE')

</form>

@endsection