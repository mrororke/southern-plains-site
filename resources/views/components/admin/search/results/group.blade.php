@props([
    'label',
    'count' => 0,
])

<section>

    <div
        class="border-b border-sp-warmStone bg-sp-limestone
               px-4 py-2 text-xs font-semibold uppercase
               tracking-wide text-sp-slate"
    >
        {{ $label }}
        ({{ $count }})
    </div>

    {{ $slot }}

</section>