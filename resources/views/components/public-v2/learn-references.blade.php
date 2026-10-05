@props([
    'references' => [],
])

{{-- References --}}
<section class="mt-12">

    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
        References
    </h2>

    <ul class="mt-4 divide-y divide-sp-warmStone border-y border-sp-warmStone">

        @foreach ($references as $reference)

            <li class="py-4">

                <a
                    href="{{ $reference['href'] }}"
                    @if (!empty($reference['external']))
                        target="_blank"
                        rel="noopener noreferrer"
                    @endif
                    class="group flex items-start justify-between gap-6">

                    <div>

                        <h3 class="font-sans text-lg font-semibold text-sp-charcoal transition-colors group-hover:text-sp-prairieOchre">
                            {{ $reference['title'] }}
                        </h3>

                        @if (!empty($reference['description']))
                            <p class="body text-sp-slate mt-1">
                                {{ $reference['description'] }}
                            </p>
                        @endif

                    </div>

                    <x-icons.move-right
                        class="mt-1 h-5 w-5 shrink-0 text-sp-prairieOchre"
                        aria-hidden="true" />

                </a>

            </li>

        @endforeach

    </ul>

</section>
{{-- End References --}}