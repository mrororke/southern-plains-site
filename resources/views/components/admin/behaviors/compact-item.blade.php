<!-- This will be the compact view<br/>
It could eventually show:
behavior name;
category or discipline;
“updated” or “added” information;
link to the separate behavior detail page.
That keeps it distinct from your desktop table row and from the full behavior detail component. -->

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

<article
    class="px-5 py-4 {{ $last ? '' : 'border-b border-sp-warmStone' }}"
>
    <div class="flex items-start justify-between gap-4">

        <div class="min-w-0">
            <h3 class="font-semibold text-sp-charcoal">
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