@php
    $index = $index ?? '__INDEX__';

    $platforms = [
        'youtube' => 'YouTube',
        'tiktok' => 'TikTok',
        'instagram' => 'Instagram',
        'facebook' => 'Facebook',
        'unknown' => 'Unknown',
    ];
@endphp

<div
    class="video-row rounded-md border border-sp-warmStone
           bg-sp-warmIvory p-4"
    data-index="{{ $index }}"
>
    {{-- Duplicate warning --}}
    <div
        class="duplicate-warning mb-3 hidden rounded-md
               bg-red-50 px-3 py-2 text-sm text-red-700"
    ></div>

    {{-- Existing video ID for edit mode --}}
    @if(! empty($videoId))
        <input
            type="hidden"
            name="videos[{{ $index }}][id]"
            value="{{ $videoId }}"
        >
    @endif

    <div class="flex items-start justify-between gap-4">
        <div class="min-w-0 flex-1">
            <label
                for="video-url-{{ $index }}"
                class="mb-1 block text-xs font-semibold uppercase
                       tracking-wide text-sp-slate"
            >
                Video URL
            </label>

            <input
                id="video-url-{{ $index }}"
                type="url"
                name="videos[{{ $index }}][url]"
                value="{{ $url ?? '' }}"
                placeholder="Paste video URL"
                class="video-url w-full rounded-md border
                       border-sp-slate bg-transparent
                       placeholder:italic placeholder:text-sp-slate
                       focus:border-sp-charcoal"
            >
        </div>

        <button
            type="button"
            class="remove-video-row inline-flex shrink-0 items-center
                   justify-center rounded-md border border-sp-warmStone
                   bg-transparent p-2 text-sp-slate transition-colors
                   hover:bg-sp-limestone hover:text-sp-burntClay"
            aria-label="Remove video"
        >
            <x-icons.trash-2 class="h-4 w-4" />
        </button>
    </div>

    <div class="mt-4 grid gap-4 md:grid-cols-2">
        {{-- Platform --}}
        <div>
            <label
                for="video-platform-{{ $index }}"
                class="mb-1 block text-xs font-semibold uppercase
                       tracking-wide text-sp-slate"
            >
                Platform
            </label>

            <select
                id="video-platform-{{ $index }}"
                name="videos[{{ $index }}][platform]"
                class="video-platform w-full rounded-md border
                       border-sp-slate bg-transparent
                       focus:border-sp-charcoal"
            >
                @foreach($platforms as $value => $label)
                    <option
                        value="{{ $value }}"
                        @selected(($currentPlatform ?? 'unknown') === $value)
                    >
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Creator --}}
        <div>
            <label
                for="video-creator-{{ $index }}"
                class="mb-1 block text-xs font-semibold uppercase
                       tracking-wide text-sp-slate"
            >
                Creator
            </label>

            <input
                id="video-creator-{{ $index }}"
                type="text"
                name="videos[{{ $index }}][creator]"
                value="{{ $creator ?? '' }}"
                placeholder="Creator name"
                class="w-full rounded-md border border-sp-slate
                       bg-transparent placeholder:italic
                       placeholder:text-sp-slate
                       focus:border-sp-charcoal"
            >
        </div>
    </div>

    {{-- Preferred --}}
    <label
        class="mt-4 inline-flex cursor-pointer items-center gap-2
               text-sm font-medium text-sp-charcoal"
    >
        <input
            type="checkbox"
            name="videos[{{ $index }}][is_preferred]"
            value="1"
            @checked($isPreferred ?? false)
            class="preferred-video rounded border-sp-slate
                   text-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        Preferred video
    </label>
</div>