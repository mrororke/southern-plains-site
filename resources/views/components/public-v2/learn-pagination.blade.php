@props([
    'paginator',
])

@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();

    /*
     * Display a maximum of five page numbers.
     * Keep the current page centered when possible.
     */
    $startPage = max(1, $currentPage - 2);
    $endPage = min($lastPage, $startPage + 4);

    $startPage = max(1, $endPage - 4);
@endphp

{{-- Learn Pagination --}}
@if ($paginator->hasPages())

    <nav
        class="px-6 pb-12 md:px-8 md:pb-16"
        aria-label="Learn pagination">

        <ul class="flex flex-wrap items-center justify-center gap-2">

            {{-- Previous --}}
            <li>

                @if ($paginator->onFirstPage())

                    <span
                        class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-3 py-2 text-xs uppercase text-sp-slate opacity-50 md:px-4 md:py-3 md:text-sm"
                        aria-disabled="true">

                        Previous

                    </span>

                @else

                    <a
                        href="{{ $paginator->previousPageUrl() }}"
                        rel="prev"
                        class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-3 py-2 text-xs uppercase text-sp-slate transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:px-4 md:py-3 md:text-sm">

                        Previous

                    </a>

                @endif

            </li>


            {{-- First Page --}}
            @if ($startPage > 1)

                <li>

                    <a
                        href="{{ $paginator->url(1) }}"
                        class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">

                        1

                    </a>

                </li>

                {{-- Leading Ellipsis --}}
                @if ($startPage > 2)

                    <li>

                        <span
                            class="inline-flex min-w-9 items-center justify-center px-2 py-2 text-xs text-sp-slate md:min-w-11 md:px-3 md:py-3 md:text-sm"
                            aria-hidden="true">

                            …

                        </span>

                    </li>

                @endif

            @endif


            {{-- Page Numbers --}}
            @for ($page = $startPage; $page <= $endPage; $page++)

                <li>

                    @if ($page === $currentPage)

                        <span
                            class="inline-flex min-w-9 items-center justify-center rounded-md bg-sp-prairieGreen px-2 py-2 text-xs text-sp-warmIvory md:min-w-11 md:px-3 md:py-3 md:text-sm"
                            aria-current="page">

                            {{ $page }}

                        </span>

                    @else

                        <a
                            href="{{ $paginator->url($page) }}"
                            class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">

                            {{ $page }}

                        </a>

                    @endif

                </li>

            @endfor


            {{-- Last Page --}}
            @if ($endPage < $lastPage)

                {{-- Trailing Ellipsis --}}
                @if ($endPage < $lastPage - 1)

                    <li>

                        <span
                            class="inline-flex min-w-9 items-center justify-center px-2 py-2 text-xs text-sp-slate md:min-w-11 md:px-3 md:py-3 md:text-sm"
                            aria-hidden="true">

                            …

                        </span>

                    </li>

                @endif

                <li>

                    <a
                        href="{{ $paginator->url($lastPage) }}"
                        class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">

                        {{ $lastPage }}

                    </a>

                </li>

            @endif


            {{-- Next --}}
            <li>

                @if ($paginator->hasMorePages())

                    <a
                        href="{{ $paginator->nextPageUrl() }}"
                        rel="next"
                        class="inline-flex items-center justify-center rounded-md border border-sp-prairieGreen px-3 py-2 text-xs uppercase text-sp-prairieGreen transition-colors hover:border-sp-prairieOchre hover:text-sp-prairieOchre md:px-4 md:py-3 md:text-sm">

                        Next

                    </a>

                @else

                    <span
                        class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-3 py-2 text-xs uppercase text-sp-slate opacity-50 md:px-4 md:py-3 md:text-sm"
                        aria-disabled="true">

                        Next

                    </span>

                @endif

            </li>

        </ul>

    </nav>

@endif
{{-- End Learn Pagination --}}