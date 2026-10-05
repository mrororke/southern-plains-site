@props([
    'stars' => 0,
])

@php
    $stars = min(5, max(0, (float) $stars));
@endphp

{{-- Book Rating --}}
<div
    class="flex items-center gap-1"
    aria-label="Rated {{ $stars }} out of 5 stars">

    @for ($i = 1; $i <= 5; $i++)

        @if ($i <= $stars)

            <x-icons.star
                class="h-5 w-5 fill-current text-sp-prairieOchre"
                aria-hidden="true" />

        @else

            <x-icons.star
                class="h-5 w-5 text-sp-warmStone"
                aria-hidden="true" />

        @endif

    @endfor

</div>
{{-- End Book Rating --}}