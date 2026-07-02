<div class="border rounded p-3 space-y-2 bg-gray-50 video-row" data-index="{{ $index }}">

    <div class="duplicate-warning text-sm text-red-600"></div>

    @if(!empty($videoId))
        <input type="hidden" name="videos[{{ $index }}][id]" value="{{ $videoId }}">
    @endif

    <input
        name="videos[{{ $index }}][url]"
        value="{{ $url ?? '' }}"
        placeholder="Paste video URL"
        class="w-full border p-2 rounded video-url"
        oninput="window.TrickCatalogEdit.autoDetectVideo(this, {{ $index }})">

    <div class="grid grid-cols-3 gap-2">

        <select name="videos[{{ $index }}][platform]"
                class="border p-2 rounded">

            @foreach(['tiktok','instagram','facebook','youtube','unknown'] as $platform)
                <option value="{{ $platform }}"
                    @selected(($currentPlatform ?? '') === $platform)>
                    {{ ucfirst($platform) }}
                </option>
            @endforeach

        </select>

        <input
            name="videos[{{ $index }}][creator]"
            value="{{ $creator ?? '' }}"
            placeholder="Creator"
            class="border p-2 rounded">

        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox"
                   name="videos[{{ $index }}][is_preferred]"
                   @checked($isPreferred ?? false)>
            Preferred
        </label>

    </div>

</div>