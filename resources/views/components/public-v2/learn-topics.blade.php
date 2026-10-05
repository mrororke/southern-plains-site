@props([
    'topics' => [],
])

{{-- Browse by Topic --}}
<section class="px-6 pt-8 pb-14 md:px-8 md:pt-10 md:pb-16">

    <h2 class="body-small text-sp-charcoal uppercase">
        Browse by Topic
    </h2>

    <ul class="flex flex-wrap gap-3 md:gap-4 mt-4">

        @foreach ($topics as $topic)

            <li>

                <a
                    href="{{ $topic['href'] ?? '#' }}"
                    class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-warmStone">

                    {{ $topic['label'] }}

                </a>

            </li>

        @endforeach

    </ul>

</section>
{{-- End Browse by Topic --}}