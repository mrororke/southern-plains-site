@if ($paginator->hasPages())
    <nav
        role="navigation"
        aria-label="{{ __('Pagination Navigation') }}"
        class="mt-12 border-t border-stone-300 pt-6"
    >
        {{-- Mobile --}}
        <div class="flex items-center justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-stone-400"
                >
                    Previous
                </span>
            @else
                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    rel="prev"
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-stone-900
                           transition hover:text-orange-800
                           focus-visible:outline focus-visible:outline-2
                           focus-visible:outline-offset-4"
                >
                    Previous
                </a>
            @endif

            <span class="font-sans text-sm text-stone-600">
                Page {{ $paginator->currentPage() }}
                of {{ $paginator->lastPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    rel="next"
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-stone-900
                           transition hover:text-orange-800
                           focus-visible:outline focus-visible:outline-2
                           focus-visible:outline-offset-4"
                >
                    Next
                </a>
            @else
                <span
                    class="inline-flex min-h-11 items-center px-4 py-2
                           font-sans text-sm font-semibold text-stone-400"
                >
                    Next
                </span>
            @endif
        </div>

        {{-- Desktop --}}
        <div class="hidden items-center justify-between gap-8 sm:flex">
            <p class="font-sans text-sm text-stone-600">
                Showing
                <span class="font-semibold text-stone-900">
                    {{ $paginator->firstItem() }}
                </span>
                to
                <span class="font-semibold text-stone-900">
                    {{ $paginator->lastItem() }}
                </span>
                of
                <span class="font-semibold text-stone-900">
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
                               text-stone-300"
                    >
                        <span aria-hidden="true">&larr;</span>
                    </span>
                @else
                    <a
                        href="{{ $paginator->previousPageUrl() }}"
                        rel="prev"
                        aria-label="{{ __('Previous') }}"
                        class="inline-flex size-11 items-center justify-center
                               text-stone-700 transition
                               hover:bg-stone-100 hover:text-orange-800
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
                                   text-sm text-stone-400"
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
                                           justify-center bg-stone-900
                                           font-sans text-sm font-semibold
                                           text-white"
                                >
                                    {{ $page }}
                                </span>
                            @else
                                <a
                                    href="{{ $url }}"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                    class="inline-flex size-11 items-center
                                           justify-center font-sans text-sm
                                           font-semibold text-stone-700
                                           transition hover:bg-stone-100
                                           hover:text-orange-800
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
                               text-stone-700 transition
                               hover:bg-stone-100 hover:text-orange-800
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
                               text-stone-300"
                    >
                        <span aria-hidden="true">&rarr;</span>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif