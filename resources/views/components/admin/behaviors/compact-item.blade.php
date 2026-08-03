@props([
    'behavior',
    'last' => false,
])

@php
    /*
     * updated_by is assigned when an existing behavior is edited.
     * If it is empty, this is treated as a newly added behavior.
     */
    $wasEdited = ! empty($behavior->updated_by);

    $activityLabel = $wasEdited
        ? 'Updated'
        : 'Added';

    $activityUser = $wasEdited
        ? $behavior->updater
        : $behavior->creator;

    $levelNames = $behavior->levels
        ->pluck('name')
        ->map(function ($name) {
            return ucwords(str_replace('_', ' ', $name));
        })
        ->join(', ');
@endphp

<a
    href="{{ route('admin-v2.behavior-catalog.show', $behavior) }}"
    class="group block px-5 py-4 transition-colors hover:bg-sp-warmIvory
           focus-visible:outline focus-visible:outline-2
           focus-visible:outline-offset-[-2px]
           focus-visible:outline-sp-prairieGreen
           {{ $last ? '' : 'border-b border-sp-warmStone' }}"
>
    <article>
        <div class="flex items-start justify-between gap-4">

            <div class="min-w-0">
                <h3
                    class="font-semibold text-sp-charcoal transition-colors
                           group-hover:text-sp-prairieGreen"
                >
                    {{ $behavior->name }}
                </h3>

                @if($levelNames)
                    <p class="mt-1 text-sm text-sp-slate">
                        {{ $levelNames }}
                    </p>
                @else
                    <p class="mt-1 text-sm italic text-sp-slate">
                        No category
                    </p>
                @endif
            </div>

            <span class="shrink-0 text-xs text-sp-slate">
                {{ $behavior->updated_at->diffForHumans() }}
            </span>

        </div>

        <p class="mt-2 text-xs text-sp-slate">
            {{ $activityLabel }}

            @if($activityUser)
                by {{ $activityUser->name }}
            @endif
        </p>
    </article>
</a>