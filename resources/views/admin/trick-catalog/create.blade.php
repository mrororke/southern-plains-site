@extends('layouts.portal')

@section('title', 'Create Trick')

@section('content')

<div class="max-w-4xl">

    <form method="POST" action="{{ route('admin.trick-catalog.store') }}">
        @csrf

        {{-- =========================
            TRICK INFO
        ========================= --}}
        <div class="bg-white p-4 rounded shadow space-y-4 mb-6">

            <h2 class="font-semibold text-lg">Create Trick</h2>

            <div>
                <label class="text-sm font-semibold">Name</label>
                <input name="name"
                    class="w-full border p-2 rounded"
                    required>
            </div>

            <div>
    <label class="text-sm font-semibold">Level</label>

    <select name="levels[]" multiple class="w-full border p-2 rounded">

        @foreach([
            'novice',
            'intermediate',
            'advanced',
            'performer',
            'performer_elite'
        ] as $level)

            <option value="{{ $level }}">
                {{ ucfirst(str_replace('_',' ', $level)) }}
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

        {{-- =========================
            VIDEO SYSTEM
        ========================= --}}
        <div class="bg-white p-4 rounded shadow">

            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-lg">Videos</h2>

                <button type="button"
                    onclick="addVideoRow()"
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

{{-- =========================================================
    JAVASCRIPT
========================================================= --}}
<script>
    let videoIndex = 0;

    /**
     * Add a new video row
     */
    function addVideoRow() {
        const container = document.getElementById('video-container');

        const index = videoIndex++;

        const row = document.createElement('div');
        row.className = "border rounded p-3 space-y-2 bg-gray-50";

        row.innerHTML = `
        <div class="duplicate-warning text-sm text-red-600"></div>

        <input name="videos[${index}][url]"
               placeholder="Paste video URL"
               class="w-full border p-2 rounded video-url"
               oninput="autoDetectVideo(this, ${index})">

        <div class="grid grid-cols-3 gap-2">

            <select name="videos[${index}][platform]"
                    class="border p-2 rounded">
                <option value="tiktok">TikTok</option>
                <option value="instagram">Instagram</option>
                <option value="facebook">Facebook</option>
                <option value="youtube">YouTube</option>
                <option value="unknown">Unknown</option>
            </select>

            <input name="videos[${index}][creator]"
                   placeholder="Creator"
                   class="border p-2 rounded">

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox"
                       name="videos[${index}][is_preferred]">
                Preferred
            </label>

        </div>
    `;

        container.appendChild(row);
    }

    /**
     * Auto detect platform + trigger duplicate check
     */
    function autoDetectVideo(input, index) {
        const url = input.value;

        const platformField = document.querySelector(
            `select[name="videos[${index}][platform]"]`
        );

        if (!url) return;

        if (url.includes('tiktok')) {
            platformField.value = 'tiktok';
        } else if (url.includes('instagram')) {
            platformField.value = 'instagram';
        } else if (url.includes('facebook')) {
            platformField.value = 'facebook';
        } else if (url.includes('youtu')) {
            platformField.value = 'youtube';
        } else {
            platformField.value = 'unknown';
        }

        checkDuplicate(url, index);
    }

    /**
     * Server-side duplicate check
     */
    function checkDuplicate(url, index) {
        fetch("{{ route('admin.trick-catalog.check-video') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    url
                })
            })
            .then(res => res.json())
            .then(data => {

                const row = document.querySelectorAll('#video-container > div')[index];

                if (!row) return;

                let warning = row.querySelector('.duplicate-warning');

                if (data.exists) {
                    warning.innerHTML =
                        `⚠ Already exists in trick: <strong>${data.trick}</strong>`;
                } else {
                    warning.innerHTML = '';
                }

            })
            .catch(err => {
                console.error('Duplicate check failed:', err);
            });
    }
</script>

@endsection