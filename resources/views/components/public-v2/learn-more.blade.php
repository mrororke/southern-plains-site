@props([
    'items' => [],
    'libraryUrl' => '#',
])

{{-- Learn More --}}
<section class="mt-16 md:mt-20">

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12">

            {{-- Section Header --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <h2 class="font-sans text-lg font-semibold text-sp-charcoal">
                    Keep Learning
                </h2>

                <a
                    href="{{ $libraryUrl }}"
                    class="inline-flex items-center gap-2 font-sans text-base font-semibold text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                    View Full Library

                    <x-icons.move-right
                        class="w-5 h-5 shrink-0"
                        aria-hidden="true" />

                </a>

            </div>
            {{-- End Section Header --}}

            {{-- Resource Cards --}}
            <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-4">

                @foreach ($items as $item)

                    <article class="rounded-md border border-sp-warmStone p-5">

                        <a
                            href="{{ $item['href'] }}"
                            class="block rounded-md focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen">

                            <img
                                src="{{ $item['image'] }}"
                                alt="{{ $item['image_alt'] }}"
                                class="block w-full aspect-[16/9] object-cover rounded-md">

                        </a>

                        <p class="font-display text-sm text-sp-prairieOchre uppercase mt-6">
                            {{ $item['category'] }}
                        </p>

                        <h3 class="font-sans text-lg font-semibold mt-2">

                            <a
                                href="{{ $item['href'] }}"
                                class="text-sp-charcoal transition-colors hover:text-sp-prairieGreen focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen">

                                {{ $item['title'] }}

                            </a>

                        </h3>

                        <p class="body-small text-sp-slate mt-4">
                            {{ $item['description'] }}
                        </p>

                        <a
                            href="{{ $item['href'] }}"
                            class="inline-flex items-center gap-2 mt-4 font-sans text-sm font-semibold uppercase tracking-wide text-sp-prairieOchre transition-colors hover:text-sp-prairieGreen">

                            {{ $item['link_label'] ?? 'Read More' }}

                            <x-icons.move-right
                                class="w-5 h-5 shrink-0"
                                aria-hidden="true" />

                        </a>

                    </article>

                @endforeach

            </div>
            {{-- End Resource Cards --}}

        </div>

    </div>

</section>
{{-- End Learn More --}}