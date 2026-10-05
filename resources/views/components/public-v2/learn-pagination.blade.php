@props([
    'currentPage' => 1,
    'lastPage' => 10,
])

{{-- Learn Pagination --}}
<nav
    class="px-6 pb-12 md:px-8 md:pb-16"
    aria-label="Learn pagination">

    <ul class="flex flex-wrap items-center justify-center gap-2">

        {{-- Previous --}}
        <li>

            @if ($currentPage > 1)

                <a
                    href="#"
                    class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-3 py-2 text-xs uppercase text-sp-slate transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:px-4 md:py-3 md:text-sm">

                    Previous

                </a>

            @else

                <span
                    class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-3 py-2 text-xs uppercase text-sp-slate opacity-50 md:px-4 md:py-3 md:text-sm"
                    aria-disabled="true">

                    Previous

                </span>

            @endif

        </li>

        {{-- Current Page --}}
        <li>

            <span
                class="inline-flex min-w-9 items-center justify-center rounded-md bg-sp-prairieGreen px-2 py-2 text-xs text-sp-warmIvory md:min-w-11 md:px-3 md:py-3 md:text-sm"
                aria-current="page">

                {{ $currentPage }}

            </span>

        </li>

        {{-- Page 2 --}}
        @for ($page = 2; $page <= min(4, $lastPage); $page++)

            <li>

                <a
                    href="#"
                    class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">

                    {{ $page }}

                </a>

            </li>

        @endfor

        {{-- Ellipsis --}}
        @if ($lastPage > 5)

            <li>

                <span
                    class="inline-flex min-w-9 items-center justify-center px-2 py-2 text-xs text-sp-slate md:min-w-11 md:px-3 md:py-3 md:text-sm"
                    aria-hidden="true">

                    …

                </span>

            </li>

        @endif

        {{-- Last Page --}}
        @if ($lastPage > 4)

            <li>

                <a
                    href="#"
                    class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">

                    {{ $lastPage }}

                </a>

            </li>

        @endif

        {{-- Next --}}
        <li>

            @if ($currentPage < $lastPage)

                <a
                    href="#"
                    class="inline-flex items-center justify-center rounded-md border border-sp-prairieGreen px-3 py-2 text-xs uppercase text-sp-prairieGreen transition-colors hover:border-sp-prairieOchre hover:text-sp-prairieOchre md:px-4 md:py-3 md:text-sm">

                    Next

                </a>

            @else

                <span
                    class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-3 py-2 text-xs uppercase text-sp-slate opacity-50 md:px-4 md:py-3 md:text-sm">

                    Next

                </span>

            @endif

        </li>

    </ul>

</nav>
{{-- End Learn Pagination --}}