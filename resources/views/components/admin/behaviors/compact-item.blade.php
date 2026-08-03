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
@endphp

<a
    href="{{ route('admin-v2.behavior-catalog.show', $behavior) }}"
    class="group flex items-center justify-between gap-4 px-5 py-4
           transition-colors hover:bg-sp-limestone
           focus-visible:outline focus-visible:outline-2
           focus-visible:outline-offset-[-2px]
           focus-visible:outline-sp-prairieGreen
           {{ $last ? '' : 'border-b border-sp-warmStone' }}"
>
    <div class="min-w-0">
        <h2
            class="font-semibold text-sp-charcoal transition-colors
                   group-hover:text-sp-prairieGreen"
        >
            {{ $behavior->name }}
        </h2>

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
            Updated {{ $behavior->updated_at->diffForHumans() }}
        </p>
    </div>

    <svg
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="2"
        stroke="currentColor"
        class="h-5 w-5 shrink-0 text-sp-slate transition
               group-hover:translate-x-1 group-hover:text-sp-prairieGreen"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="m9 18 6-6-6-6"
        />
    </svg>
</a>