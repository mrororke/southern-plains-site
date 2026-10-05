@props([
    'stars' => 0,
])

@php
    $stars = min(5, max(0, (int) $stars));
@endphp

{{-- Book Rating --}}
<div
    class="flex items-center gap-1"
    aria-label="Rated {{ $stars }} out of 5 stars">

    @for ($i = 1; $i <= 5; $i++)

        <x-icons.star
            class="h-5 w-5 {{ $i <= $stars ? 'fill-current text-sp-prairieOchre' : 'text-sp-warmStone' }}"
            aria-hidden="true" />

    @endfor

</div>
{{-- End Book Rating --}}