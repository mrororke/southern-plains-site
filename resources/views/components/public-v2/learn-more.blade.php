@props([
    'items' => [],
    'libraryUrl' => '#',
])

{{-- Learn More --}}
<section class="mt-16 md:mt-20">

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 md:col-span-10">

            {{-- Section Header --}}
            <div class="flex items-end justify-between gap-6">

                <div>
                    <h2 class="font-sans text-lg font-semibold text-sp-charcoal mt-2">
                        Keep Learning
                    </h2>

                </div>

                <a
                    href="{{ $libraryUrl }}"
                    class="hidden md:inline-flex items-center gap-2 font-sans text-base font-semibold text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                    View Full Library

                    <x-icons.move-right
                        class="w-5 h-5 shrink-0"
                        aria-hidden="true" />

                </a>

            </div>

            {{-- Resource Cards --}}
            <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-4">

                @foreach ($items as $item)

                    <article class="rounded-md border border-sp-warmStone p-5">

                        <img
                            src="{{ $item['image'] }}"
                            alt="{{ $item['image_alt'] }}"
                            class="block w-full aspect-[16/9] object-cover rounded-md">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase mt-6">
                            {{ $item['category'] }}
                        </p>

                        <h3 class="font-sans text-2xl font-semibold text-sp-charcoal mt-2">
                            {{ $item['title'] }}
                        </h3>

                        <p class="body text-sp-slate mt-4">
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

            {{-- Mobile Library Link --}}
            <a
                href="{{ $libraryUrl }}"
                class="inline-flex md:hidden items-center gap-2 mt-6 font-sans text-base font-semibold text-sp-prairieGreen">

                View Full Library

                <x-icons.move-right
                    class="w-5 h-5 shrink-0"
                    aria-hidden="true" />

            </a>

        </div>

    </div>

</section>
{{-- End Learn More --}}