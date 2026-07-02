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
        <div class="bg-white p-4 rounded shadow space-y-4 mb-6">

            <h2 class="font-semibold text-lg">Edit Trick</h2>

            <button type="button"
                    onclick="confirmDeleteTrick()"
                    class="bg-red-600 text-white px-4 py-2 rounded">
                Delete Trick
            </button>

            <div>
                <label class="text-sm font-semibold">Name</label>
                <input name="name"
                       value="{{ old('name', $trick->name) }}"
                       class="w-full border p-2 rounded"
                       required>
            </div>

            <div>
                <label class="text-sm font-semibold">Levels</label>

                <select name="levels[]" multiple class="w-full border p-2 rounded">

                    @foreach($levels as $level)
                        <option value="{{ $level->id }}"
                            @selected($trick->levels->contains('id', $level->id))>
                            {{ $level->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="text-sm font-semibold">Notes</label>
                <textarea name="notes"
                          class="w-full border p-2 rounded">{{ old('notes', $trick->notes) }}</textarea>
            </div>

        </div>

        {{-- VIDEOS --}}
        <div class="bg-white p-4 rounded shadow">

            <div class="flex justify-between mb-4">
                <h2 class="font-semibold text-lg">Videos</h2>

                <button type="button"
                        id="add-video-btn"
                        class="bg-black text-white px-3 py-1 rounded">
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
            <button class="bg-green-600 text-white px-5 py-2 rounded">
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