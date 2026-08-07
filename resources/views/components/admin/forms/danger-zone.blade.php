@props([
    'title' => 'Danger Zone',
    'description',
    'buttonLabel',
    'action',
])

<section
    {{ $attributes->class(
        'mt-6 rounded-md border border-sp-clayRed/40
         bg-sp-clayRed/5 p-6'
    ) }}
>
    <div class="flex items-center justify-between gap-6">

        <div>
            <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
                {{ $title }}
            </h2>

            <p class="mt-1 max-w-2xl text-sm text-sp-slate">
                {{ $description }}
            </p>
        </div>

        <button
            type="button"
            onclick="{{ $action }}"
            class="inline-flex shrink-0 items-center justify-center gap-2
                   rounded-md border border-sp-clayRed px-4 py-2
                   text-sm font-semibold text-sp-clayRed
                   transition-colors
                   hover:bg-sp-clayRed hover:text-sp-warmIvory"
        >
            <x-icons.trash-2 class="h-4 w-4" />

            {{ $buttonLabel }}
        </button>

    </div>
</section>