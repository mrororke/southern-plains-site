@props([
    'cancelHref',
    'submitLabel',
])

<div
    {{ $attributes->class(
        'mt-6 flex items-center justify-between gap-3
         border-t border-sp-warmStone pt-6'
    ) }}
>
    <div>
        {{ $danger ?? '' }}
    </div>

    <div class="flex items-center gap-3">
        <a
            href="{{ $cancelHref }}"
            class="inline-flex items-center justify-center rounded-md
                   border border-sp-warmStone bg-sp-warmIvory
                   px-4 py-2 text-sm font-semibold text-sp-charcoal
                   transition-colors hover:bg-sp-limestone"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="inline-flex items-center justify-center gap-2
                   rounded-md bg-sp-prairieGreen px-4 py-2
                   text-sm font-semibold text-sp-warmIvory
                   transition-colors hover:bg-sp-prairieOchre"
        >
            <x-icons.check class="h-4 w-4" />

            {{ $submitLabel }}
        </button>
    </div>
</div>