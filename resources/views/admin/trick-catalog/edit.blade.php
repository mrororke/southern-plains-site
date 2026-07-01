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

        <h2 class="font-semibold text-lg">
            Edit Trick
        </h2>


        <div>
            <label class="text-sm font-semibold">
                Name
            </label>

            <input
                name="name"
                value="{{ old('name', $trick->name) }}"
                class="w-full border p-2 rounded"
                required>
        </div>


        <div>
            <label class="text-sm font-semibold">
                Level
            </label>

            <select name="level"
                    class="w-full border p-2 rounded">

                @foreach([
                    'novice',
                    'intermediate',
                    'advanced',
                    'performer',
                    'performer_elite'
                ] as $level)

                    <option value="{{ $level }}"
                        @selected($trick->level === $level)>
                        {{ ucfirst(str_replace('_',' ', $level)) }}
                    </option>

                @endforeach

            </select>
        </div>


        <div>

            <label class="text-sm font-semibold">
                Notes
            </label>

            <textarea
                name="notes"
                class="w-full border p-2 rounded">{{ old('notes', $trick->notes) }}</textarea>

        </div>

    </div>


    {{-- VIDEOS --}}
    <div class="bg-white p-4 rounded shadow">

        <div class="flex justify-between mb-4">

            <h2 class="font-semibold text-lg">
                Videos
            </h2>


            <button type="button"
                    onclick="addVideoRow()"
                    class="bg-black text-white px-3 py-1 rounded">
                + Add Video
            </button>

        </div>


        <div id="video-container"
             class="space-y-3">


            @foreach($trick->videos as $index => $video)

            <div class="border rounded p-3 bg-gray-50">

                <input type="hidden"
                       name="videos[{{ $index }}][id]"
                       value="{{ $video->id }}">


                <input
                    name="videos[{{ $index }}][url]"
                    value="{{ $video->url }}"
                    class="w-full border p-2 rounded mb-2">


                <input
                    name="videos[{{ $index }}][creator]"
                    value="{{ $video->creator }}"
                    class="w-full border p-2 rounded mb-2">


                <select
                    name="videos[{{ $index }}][platform]"
                    class="border p-2 rounded">

                    @foreach(['tiktok','instagram','facebook','youtube','unknown'] as $platform)

                    <option value="{{ $platform }}"
                        @selected($video->platform === $platform)>
                        {{ ucfirst($platform) }}
                    </option>

                    @endforeach

                </select>


                <label class="ml-4 text-sm">

                    <input type="checkbox"
                           name="videos[{{ $index }}][is_preferred]"
                           @checked($video->is_preferred)>

                    Preferred

                </label>


            </div>

            @endforeach


        </div>


    </div>


    <button class="mt-6 bg-green-600 text-white px-5 py-2 rounded">
        Save Changes
    </button>


</form>

</div>





@endsection<script>

let videoIndex = {{ $trick->videos->count() }};


function addVideoRow()
{

    let container = document.getElementById('video-container');


    container.insertAdjacentHTML(
        'beforeend',
        `

        <div class="border rounded p-3 bg-gray-50">

            <input
                name="videos[${videoIndex}][url]"
                placeholder="Video URL"
                onblur="detectPlatform(this, ${videoIndex})"
                class="w-full border p-2 rounded mb-2">


            <input
                name="videos[${videoIndex}][creator]"
                placeholder="Creator"
                class="w-full border p-2 rounded mb-2">


            <select
                id="platform-${videoIndex}"
                name="videos[${videoIndex}][platform]"
                class="border p-2 rounded">


                <option value="instagram">
                    Instagram
                </option>


                <option value="facebook">
                    Facebook
                </option>


                <option value="tiktok">
                    TikTok
                </option>


                <option value="youtube">
                    YouTube
                </option>


                <option value="unknown">
                    Unknown
                </option>


            </select>


        </div>

        `
    );


    videoIndex++;

}



function detectPlatform(input, index)
{

    let url = input.value;


    if (!url) {
        return;
    }


    fetch('{{ route('admin.trick-catalog.check-video') }}', {

        method: 'POST',

        headers: {

            'Content-Type': 'application/json',

            'X-CSRF-TOKEN':
                '{{ csrf_token() }}'

        },


        body: JSON.stringify({

            url: url

        })

    })


    .then(response => response.json())


    .then(data => {


        let select =
            document.getElementById(
                `platform-${index}`
            );


        if (select && data.platform) {

            select.value = data.platform;

        }


    });

}

</script>