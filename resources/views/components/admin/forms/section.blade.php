@props([
    'eyebrow',
    'title',
    'description' => null,
    'headerBorder' => false,
])

<section
    {{ $attributes->class(
        'mb-6 rounded-md border border-sp-warmStone
         bg-sp-warmIvory p-6'
    ) }}
>
    <div
        @class([
            'mb-6',
            'flex items-start justify-between gap-4 border-b border-sp-warmStone pb-4'
                => $headerBorder,
        ])
    >
        <div>
            <p
                class="font-display text-sm uppercase tracking-wide
                       text-sp-burntClay"
            >
                {{ $eyebrow }}
            </p>

            <h2
                class="mt-1 font-sans text-3xl font-semibold
                       text-sp-charcoal"
            >
                {{ $title }}
            </h2>

            @if($description)
                <p class="mt-1 max-w-3xl text-sm text-sp-slate">
                    {{ $description }}
                </p>
            @endif
        </div>

        @isset($actions)
            <div class="shrink-0">
                {{ $actions }}
            </div>
        @endisset
    </div>

    {{ $slot }}
</section>