@props([
    'items' => [],
])

{{-- Guide Navigation --}}
<aside
    class="hidden md:col-span-2 md:block md:self-start md:sticky md:top-8 md:border-l md:border-sp-warmStone md:pl-6"
    aria-label="Guide navigation">

    <nav>

        <p class="font-display font-bold text-2xl text-sp-prairieGreen uppercase">
            In This Guide
        </p>

        <ul class="flex flex-col gap-4 mt-2">

            @foreach ($items as $item)

                <li>
                    <a
                        href="#{{ $item['id'] }}"
                        data-guide-nav
                        data-target="{{ $item['id'] }}"
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        {{ $item['label'] }}
                    </a>
                </li>

            @endforeach

        </ul>

    </nav>

</aside>
{{-- End Guide Navigation --}}