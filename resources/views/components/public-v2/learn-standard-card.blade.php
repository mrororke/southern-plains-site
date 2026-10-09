@props([
    'image',
    'imageAlt',
    'category',
    'title',
    'description',
    'href' => '#',
    'linkLabel' => 'Read More',
])

{{-- Learn Card --}}
<article class="col-span-12 md:col-span-4 flex flex-col rounded-md border border-sp-warmStone p-4">

    {{-- Image --}}
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

    {{-- Content --}}
    <div class="flex flex-col flex-1 pt-6">

        <p class="font-display font-bold text-lg text-sp-prairieOchre uppercase">
            {{ $category }}
        </p>

        <h2 class="font-sans text-2xl font-semibold text-sp-charcoal mt-2">

            <a
                href="{{ $href }}"
                class="transition-colors hover:text-sp-prairieOchre
                       focus-visible:outline focus-visible:outline-2
                       focus-visible:outline-offset-4 focus-visible:outline-sp-prairieOchre">

                {{ $title }}

            </a>

        </h2>

        <p class="body-small text-sp-slate mt-4">
            {{ $description }}
        </p>

        <a
            href="{{ $href }}"
            class="learn-more-link text-sp-prairieOchre mt-4">

            {{ $linkLabel }}

            <x-icons.move-right />

        </a>

    </div>

</article>
{{-- End Learn Card --}}