@props([
    'image',
    'imageAlt',
    'category',
    'title',
    'description',
    'href',
    'linkLabel' => 'Read More',
])

{{-- Featured Learn Resource --}}
<section class="px-6 py-12 md:px-8 md:py-16 bg-sp-warmIvory">

    <article class="grid grid-cols-12 gap-6 rounded-md border border-sp-warmStone bg-sp-limestone p-4 md:p-6">

        {{-- Featured Image --}}
        <div class="col-span-12 md:col-span-7">

            <a
                href="{{ $href }}"
                class="block rounded-md focus-visible:outline focus-visible:outline-2
                       focus-visible:outline-offset-4 focus-visible:outline-sp-prairieOchre"
                aria-label="{{ $title }}">

                <img
                    src="{{ $image }}"
                    alt="{{ $imageAlt }}"
                    class="w-full aspect-[16/9] object-cover rounded-md">

            </a>

        </div>

        {{-- Featured Content --}}
        <div class="col-span-12 md:col-span-5 flex items-center md:px-6">

            <div>

                <p class="font-display font-bold text-lg text-sp-prairieOchre uppercase">
                    {{ $category }}
                </p>

                <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">

                    <a
                        href="{{ $href }}"
                        class="transition-colors hover:text-sp-prairieOchre
                               focus-visible:outline focus-visible:outline-2
                               focus-visible:outline-offset-4 focus-visible:outline-sp-prairieOchre">

                        {{ $title }}

                    </a>

                </h2>

                <p class="body text-sp-slate mt-6 md:body-large">
                    {{ $description }}
                </p>

                <a
                    href="{{ $href }}"
                    class="learn-more-link text-sp-prairieOchre mt-4">

                    {{ $linkLabel }}

                    <x-icons.move-right />

                </a>

            </div>

        </div>

    </article>

</section>
{{-- End Featured Learn Resource --}}