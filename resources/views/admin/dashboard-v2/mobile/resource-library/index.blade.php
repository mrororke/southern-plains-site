@extends('admin.dashboard-v2.mobile.shell')

@section('title', 'Resource Library')

@section('content')

    <header class="mb-5">
        <p class="mb-1 text-xs font-semibold uppercase tracking-wide text-sp-slate">
            Resources
        </p>

        <h1 class="font-heading text-4xl leading-tight text-sp-charcoal">
            Resource Library
        </h1>

        <p class="mt-2 text-sm leading-relaxed text-sp-slate">
            Search the library and select a resource to read its content and related materials.
        </p>
    </header>


    {{-- Search --}}
    <form
        method="GET"
        action="{{ route('admin.resource-library.index') }}"
        class="mb-5"
    >
        <label
            for="resource-search"
            class="mb-1 block text-xs font-semibold uppercase tracking-wide text-sp-slate"
        >
            Search Resources
        </label>

        <div class="flex gap-2">
            <input
                id="resource-search"
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by title, content, series, or behavior..."
                class="min-w-0 flex-1 rounded-md border border-sp-charcoal
                       bg-transparent placeholder:italic
                       placeholder:text-sp-slate focus:border-sp-charcoal"
            >

            <button
                type="submit"
                class="inline-flex shrink-0 items-center justify-center rounded-md
                       bg-sp-prairieGreen px-4 py-2 text-sm font-semibold
                       text-sp-warmIvory transition-colors
                       hover:bg-sp-prairieOchre"
            >
                Search
            </button>
        </div>

        @if(request()->filled('search'))
            <div class="mt-2 flex items-center justify-between gap-4">
                <p class="text-sm text-sp-slate">
                    {{ $resources->total() }}
                    {{ Str::plural('result', $resources->total()) }}
                    for “{{ request('search') }}”
                </p>

                <a
                    href="{{ route('admin.resource-library.index') }}"
                    class="shrink-0 text-sm font-semibold text-sp-prairieGreen
                           transition-colors hover:text-sp-prairieOchre"
                >
                    Clear search
                </a>
            </div>
        @else
            <p class="mt-2 text-sm text-sp-slate">
                {{ $resources->total() }}
                {{ Str::plural('resource', $resources->total()) }}
            </p>
        @endif
    </form>


    {{-- Resource Results --}}
    @if($resources->isEmpty())

        <section class="rounded-md bg-sp-limestone px-5 py-6">
            <h2 class="font-semibold text-sp-charcoal">
                No resources found
            </h2>

            <p class="mt-1 text-sm text-sp-slate">
                Try a different search term or clear your current search.
            </p>
        </section>

    @else

        <section
            aria-label="Resource results"
            class="overflow-hidden rounded-md border border-sp-warmStone bg-white"
        >
            @foreach($resources as $resource)

                <div
                    @class([
                        'border-b border-sp-warmStone' => ! $loop->last,
                    ])
                >
                    @include(
                        'admin.dashboard-v2.resource-library.partials.catalog-card',
                        [
                            'resource' => $resource,
                            'mode' => 'mobile',
                        ]
                    )
                </div>

            @endforeach
        </section>


        {{-- Pagination --}}
        @if($resources->hasPages())
            <div class="mt-5">
                {{ $resources->onEachSide(1)->links() }}
            </div>
        @endif

    @endif

@endsection