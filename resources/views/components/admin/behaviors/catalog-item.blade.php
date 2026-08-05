@props([
    'behavior',
    'last' => false,
])

@php
    $levelNames = $behavior->levels
        ->pluck('name')
        ->map(function ($name) {
            return ucwords(str_replace('_', ' ', $name));
        })
        ->join(', ');

    $videoCount = $behavior->videos_count
        ?? $behavior->videos?->count()
        ?? 0;

    $hasPreferredVideo = $behavior->videos?->contains(function ($video) {
        return in_array(
            $video->is_preferred,
            [1, '1', true, 'true'],
            true
        );
    }) ?? false;
@endphp

<a
    href="{{ route('admin-v2.behavior-catalog.show', $behavior) }}"
    class="group flex items-center justify-between gap-4 px-5 py-5
           transition-colors hover:bg-sp-limestone
           focus-visible:outline focus-visible:outline-2
           focus-visible:outline-offset-[-2px]
           focus-visible:outline-sp-prairieGreen
           {{ $last ? '' : 'border-b border-sp-warmStone' }}"
>
    <div class="min-w-0 flex-1">
        <div class="flex items-start gap-2">
            <h2
                class="font-semibold text-sp-charcoal transition-colors
                       group-hover:text-sp-prairieGreen"
            >
                {{ $behavior->name }}
            </h2>

            @if($hasPreferredVideo)
                <x-icons.star
                    aria-label="Preferred video available"
                    class="mt-0.5 h-3 w-3 shrink-0 text-sp-accent"
                />
            @endif
        </div>

        @if($levelNames)
            <p class="mt-1 text-sm italic text-sp-slate">
                {{ $levelNames }}
            </p>
        @else
            <p class="mt-1 text-sm italic text-sp-slate">
                No category
            </p>
        @endif

        <p class="mt-2 text-xs text-sp-slate">
            {{ $videoCount }}
            {{ \Illuminate\Support\Str::plural('video', $videoCount) }}
        </p>

        <p class="mt-1 text-xs text-sp-slate">
            Updated {{ $behavior->updated_at->diffForHumans() }}
        </p>
    </div>

    <x-icons.chevron-right
        aria-hidden="true"
        class="h-5 w-5 shrink-0 text-sp-slate transition
               group-hover:translate-x-1
               group-hover:text-sp-prairieGreen"
    />
</a>