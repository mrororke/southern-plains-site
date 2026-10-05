@props([
    'image',
    'alt',
    'number',
    'title',
    'credit' => null,
    'creditUrl' => null,
])

{{-- Learn Figure --}}
<figure class="mt-10">

    <img
        src="{{ asset($image) }}"
        alt="{{ $alt }}"
        class="block w-full aspect-[4/3] object-cover rounded-md">

    <figcaption class="mt-3">

        <p class="font-display text-sm text-sp-prairieOchre uppercase">
            Figure {{ $number }}
        </p>

        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
            {{ $title }}
        </h3>

        <div class="body text-sp-slate mt-2">
            {{ $slot }}
        </div>

        @if ($credit)
            <p class="body-small text-sp-slate mt-2">

                Photo:
                
                @if ($creditUrl)
                    <a
                        href="{{ $creditUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-link">
                        {{ $credit }}
                    </a>
                @else
                    {{ $credit }}
                @endif

            </p>
        @endif

    </figcaption>

</figure>
{{-- End Learn Figure --}}