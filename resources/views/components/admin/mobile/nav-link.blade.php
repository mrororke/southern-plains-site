@props([
    'href',
    'active' => false,
])

<a
    href="{{ $href }}"
    @if($active)
        aria-current="page"
    @endif
    {{ $attributes->class([
        'block border-b border-sp-warmStone px-6 py-4 transition-colors',
        'bg-sp-limestone font-semibold text-sp-prairieGreen' => $active,
        'text-sp-charcoal hover:bg-sp-limestone hover:text-sp-prairieGreen' => ! $active,
    ]) }}
>
    {{ $slot }}
</a>