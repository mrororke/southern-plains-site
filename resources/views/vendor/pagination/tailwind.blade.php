@if ($paginator->hasPages())
    <nav
        role="navigation"
        aria-label="{{ __('Pagination Navigation') }}"
        class="mt-12 border-t border-sp-warmStone pt-6"
    >
        {{-- Mobile --}}
        <div class="flex items-center justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-sp-slate"
                >
                    Previous
                </span>
            @else
                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    rel="prev"
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-sp-warmIvory
                           transition hover:text-sp-prairieGreen
                           focus-visible:outline focus-visible:outline-2
                           focus-visible:outline-offset-4"
                >
                    Previous
                </a>
            @endif

            <span class="font-sans text-sm text-sp-slate">
                Page {{ $paginator->currentPage() }}
                of {{ $paginator->lastPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    rel="next"
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-sp-charcoal
                           transition hover:text-sp-prairieGreen
                           focus-visible:outline focus-visible:outline-2
                           focus-visible:outline-offset-4"
                >
                    Next
                </a>
            @else
                <span
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-sp-charcoal"
                >
                    Next
                </span>
            @endif
        </div>

        {{-- Desktop --}}
        <div class="hidden items-center justify-between gap-8 sm:flex">
            <p class="font-sans text-sm text-sp-slate">
                Showing
                <span class="font-semibold text-sp-charcoal">
                    {{ $paginator->firstItem() }}
                </span>
                to
                <span class="font-semibold text-sp-charcoal">
                    {{ $paginator->lastItem() }}
                </span>
                of
                <span class="font-semibold text-sp-charcoal">
                    {{ $paginator->total() }}
                </span>
            </p>

            <div class="flex items-center gap-1">
                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span
                        aria-disabled="true"
                        aria-label="{{ __('Previous') }}"
                        class="inline-flex size-11 items-center justify-center
                               text-sp-slate"
                    >
                        <span aria-hidden="true">&larr;</span>
                    </span>
                @else
                    <a
                        href="{{ $paginator->previousPageUrl() }}"
                        rel="prev"
                        aria-label="{{ __('Previous') }}"
                        class="inline-flex size-11 items-center justify-center
                               text-sp-warmIvory transition
                               hover:bg-sp-charcoal hover:text-prairieGreen
                               focus-visible:outline focus-visible:outline-2
                               focus-visible:outline-offset-2"
                    >
                        <span aria-hidden="true">&larr;</span>
                    </a>
                @endif

                {{-- Page numbers --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span
                            aria-disabled="true"
                            class="inline-flex size-11 items-center justify-center
                                   text-sm text-sp-slate"
                        >
                            {{ $element }}
                        </span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span
                                    aria-current="page"
                                    class="inline-flex size-11 items-center
                                           justify-center bg-sp-charcoal
                                           font-sans text-sm font-semibold
                                           text-sp-warmIvory"
                                >
                                    {{ $page }}
                                </span>
                            @else
                                <a
                                    href="{{ $url }}"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                    class="inline-flex size-11 items-center
                                           justify-center font-sans text-sm
                                           font-semibold text-sp-charcoal
                                           transition hover:bg-sp-limestone
                                           hover:text-sp-prairieGreen
                                           focus-visible:outline
                                           focus-visible:outline-2
                                           focus-visible:outline-offset-2"
                                >
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a
                        href="{{ $paginator->nextPageUrl() }}"
                        rel="next"
                        aria-label="{{ __('Next') }}"
                        class="inline-flex size-11 items-center justify-center
                               text-sp-charcoal transition
                               hover:bg-sp-limestone hover:text-sp-prairieGreen
                               focus-visible:outline focus-visible:outline-2
                               focus-visible:outline-offset-2"
                    >
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                @else
                    <span
                        aria-disabled="true"
                        aria-label="{{ __('Next') }}"
                        class="inline-flex size-11 items-center justify-center
                               text-sp-slate"
                    >
                        <span aria-hidden="true">&rarr;</span>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif