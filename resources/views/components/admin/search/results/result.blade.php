@props([
    'href',
    'title',
    'subtitle' => null,
])

<a
    href="{{ $href }}"
    class="flex items-start gap-3 px-4 py-3 transition-colors hover:bg-sp-limestone"
>

    <div class="mt-1 shrink-0">
        {{ $icon ?? '' }}
    </div>

    <div class="min-w-0 flex-1">

        <h3 class="truncate font-medium text-sp-charcoal">
            {{ $title }}
        </h3>

        @if($subtitle)
            <p class="mt-0.5 text-sm text-sp-slate">
                {{ $subtitle }}
            </p>
        @endif

    </div>

    <div class="mt-0.5 shrink-0">
        <x-icons.chevron-right
            class="h-3 w-3 text-sp-slate/60" />
    </div>

</a>