@extends('admin.dashboard-v2.mobile.shell')

@section('title', 'Behavior Catalog')

@section('content')

    <header class="mb-5">
        <p class="mb-1 text-xs font-semibold uppercase tracking-wide text-sp-slate">
            Resources
        </p>

        <h1 class="font-heading text-4xl leading-tight text-sp-charcoal">
            Behavior Catalog
        </h1>

        <p class="mt-2 text-sm leading-relaxed text-sp-slate">
            Search the catalog and select a behavior to view its notes and videos.
        </p>
    </header>

    <form
        method="GET"
        action="{{ route('admin-v2.behavior-catalog.index') }}"
        class="mb-5"
    >
        <label
            for="behavior-search"
            class="mb-1 block text-xs font-semibold uppercase tracking-wide text-sp-slate"
        >
            Search Behaviors
        </label>

        <div class="flex gap-2">
            <input
                id="behavior-search"
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name, notes, or creator..."
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
                    {{ $tricks->total() }}
                    {{ Str::plural('result', $tricks->total()) }}
                    for “{{ request('search') }}”
                </p>

                <a
                    href="{{ route('admin-v2.behavior-catalog.index') }}"
                    class="shrink-0 text-sm font-semibold text-sp-prairieGreen
                           transition-colors hover:text-sp-prairieOchre"
                >
                    Clear search
                </a>
            </div>
        @else
            <p class="mt-2 text-sm text-sp-slate">
                {{ $tricks->total() }}
                {{ Str::plural('behavior', $tricks->total()) }}
            </p>
        @endif
    </form>

    @if($tricks->isEmpty())
        <section class="rounded-md bg-sp-limestone px-5 py-6">
            <h2 class="font-semibold text-sp-charcoal">
                No behaviors found
            </h2>

            <p class="mt-1 text-sm text-sp-slate">
                Try a different search term or clear your current search.
            </p>
        </section>
    @else
        <section
            aria-label="Behavior results"
            class="overflow-hidden rounded-md border border-sp-warmStone bg-white"
        >
            @foreach($tricks as $behavior)
                <x-admin.behaviors.catalog-item
                    :behavior="$behavior"
                    :last="$loop->last"
                />
            @endforeach
        </section>

        @if($tricks->hasPages())
            <div class="mt-5">
                {{ $tricks->onEachSide(1)->links() }}
            </div>
        @endif
    @endif

@endsection