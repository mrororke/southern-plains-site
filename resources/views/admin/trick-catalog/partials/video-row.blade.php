<div class="border p-3 space-y-2 bg-gray-50 video-row" data-index="{{ $index }}">

    {{-- Duplicate warning --}}
    <div class="duplicate-warning text-sm text-red-600"></div>

    {{-- Hidden ID (edit mode only) --}}
    @if(!empty($videoId))
        <input type="hidden" name="videos[{{ $index }}][id]" value="{{ $videoId }}">
    @endif

    {{-- URL INPUT (auto-detect hook lives here now) --}}
    <input
        type="text"
        name="videos[{{ $index }}][url]"
        value="{{ $url ?? '' }}"
        placeholder="Paste video URL"
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-club focus:ring-club js-video-input video-url"
    >

    {{-- PLATFORM + META --}}
    <div class="grid grid-cols-3 gap-2">

        {{-- Platform --}}
        <select
            name="videos[{{ $index }}][platform]"
            class="mt-1 block border-gray-300 shadow-sm focus:border-club focus:ring-club"
        >
            @foreach(['tiktok','instagram','facebook','youtube','unknown'] as $platform)
                <option value="{{ $platform }}"
                    @selected(($currentPlatform ?? '') === $platform)>
                    {{ ucfirst($platform) }}
                </option>
            @endforeach
        </select>

        {{-- Creator --}}
        <input
            type="text"
            name="videos[{{ $index }}][creator]"
            value="{{ $creator ?? '' }}"
            placeholder="Creator"
            class="mt-1 block border-gray-300 shadow-sm focus:border-club focus:ring-club"
        >

        {{-- Preferred --}}
        <label class="flex items-center gap-2 text-sm">
            <input
                type="checkbox"
                name="videos[{{ $index }}][is_preferred]"
                value="1"
                @checked($isPreferred ?? false)
            >
            Preferred
        </label>

    </div>

</div>