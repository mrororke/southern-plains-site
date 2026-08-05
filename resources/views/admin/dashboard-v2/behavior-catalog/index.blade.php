@vite('resources/js/admin/trick-catalog/index.js')
@vite('resources/js/admin/behavior-catalog/index.js')
@extends('admin.dashboard-v2.desktop')

@section('content')
<div class="dashboard-content">
    <!-- HEADER IMAGE -->
    <div class="py-4">
        <img src="{{ asset('images/headers/header-behavior-catalog.jpg') }}" alt="Hamish, a Shetland Sheepdog, at a quarry box." class="rounded-md">
    </div>
    <!-- Page Heading  -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="ont-sans text-sp-charcoal font-semibold text-6xl">Behavior Catalog</h1>
        <a href="{{ route('admin.trick-catalog.create') }}"
            class="inline-flex items-center justify-center rounded-md
                bg-sp-prairieGreen px-4 py-2 text-sm font-medium text-sp-warmIvory transition-colors duration-200 hover:bg-sp-prairieOchre">
            + New Behavior
        </a>
    </div>
    <div> <!-- FILTER AREA -->
        <form id="catalog-filter-form" method="GET" action="{{ route('admin-v2.behavior-catalog.index') }}"
            class="mb-6  p-4">

            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">

                {{-- Search --}}
                <div>
                    <label class="block text-xs text-sp-slate font-semibold uppercase mb-1">
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Name, notes, creator..."
                        class="w-full border border-sp-slate rounded-md bg-transparent focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-slate">
                </div>

                {{-- Level --}}
                <div>
                    <label class="block text-xs text-sp-slate font-semibold uppercase mb-1">
                        Category
                    </label>

                    <select
                        name="level"
                        class="w-full border border-sp-slate rounded-md bg-transparent focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-slate">

                        <option value="">All Categories</option>
                        <option value="none" @selected(request('level')==='none' )>
                            No Category
                        </option>

                        @foreach($levels as $level)
                        <option
                            value="{{ $level->id }}"
                            @selected(request('level')==$level->id)>
                            {{ ucwords(str_replace('_', ' ', $level->name)) }}
                        </option>
                        @endforeach

                    </select>
                </div>

                {{-- Platform --}}
                <div>
                    <label class="block text-xs text-sp-slate font-semibold uppercase mb-1">
                        Platform
                    </label>

                    <select
                        name="platform"
                        class="w-full border border-sp-slate rounded-md bg-transparent focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-slate">

                        <option value="">All Platforms</option>
                        <option value="youtube" @selected(request('platform')=='youtube' )>YouTube</option>
                        <option value="tiktok" @selected(request('platform')=='tiktok' )>TikTok</option>
                        <option value="instagram" @selected(request('platform')=='instagram' )>Instagram</option>
                        <option value="facebook" @selected(request('platform')=='facebook' )>Facebook</option>
                        <option value="unknown" @selected(request('platform')=='unknown' )>Unknown</option>

                    </select>
                </div>

                {{-- Sort --}}
                <div>
                    <label class="block text-xs text-sp-slate font-semibold uppercase mb-1">
                        Sort
                    </label>

                    <select
                        name="sort"
                        class="w-full border border-sp-slate rounded-md bg-transparent focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-slate">

                        <option value="">Name (A–Z)</option>
                        <option value="name_desc" @selected(request('sort')=='name_desc' )>Name (Z–A)</option>
                        <option value="newest" @selected(request('sort')=='newest' )>Newest</option>
                        <option value="oldest" @selected(request('sort')=='oldest' )>Oldest</option>
                        <option value="videos" @selected(request('sort')=='videos' )>Most Videos</option>

                    </select>
                </div>

            </div>

            <div class="grid gap-4 mt-4 md:grid-cols-3">

                {{-- Preferred --}}
                <div>
                    <label class="block text-sp-slate text-xs font-semibold uppercase mb-1">
                        Preferred Video
                    </label>

                    <select
                        name="preferred"
                        class="w-full border border-sp-slate rounded-md bg-transparent focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-slate">

                        <option value="">All</option>
                        <option value="yes" @selected(request('preferred')=='yes' )>Has Preferred Video</option>
                        <option value="no" @selected(request('preferred')=='no' )>Missing Preferred Video</option>

                    </select>
                </div>

                {{-- Notes --}}
                <div>
                    <label class="block text-xs text-sp-slate font-semibold uppercase mb-1">
                        Notes
                    </label>

                    <select
                        name="notes"
                        class="w-full border border-sp-slate rounded-md bg-transparent focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-slate">

                        <option value="">All</option>
                        <option value="has" @selected(request('notes')=='has' )>Has Notes</option>
                        <option value="missing" @selected(request('notes')=='missing' )>Missing Notes</option>

                    </select>
                </div>

                {{-- Buttons --}}
                <div class="flex items-end gap-2">

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-md
                                    bg-sp-prairieGreen px-4 py-2 text-sm font-medium text-sp-warmIvory
                                    transition-colors duration-200 hover:bg-sp-prairieOchre uppercase">

                        Apply Filters

                    </button>

                    @if(request()->filled('search')
                    || request()->filled('level')
                    || request()->filled('platform')
                    || request()->filled('is_preferred')
                    || request()->filled('notes')
                    || request()->filled('sort'))

                    <a
                        href="{{ route('admin-v2.behavior-catalog.index') }}"
                        class="inline-flex items-center justify-center rounded-md
                                border border-sp-limestone bg-sp-warmIvory px-4 py-2
                                text-sm font-medium text-sp-prairieGreen
                                transition-colors duration-200 hover:bg-sp-prairieOchre hover:text-sp-warmIvory uppercase">

                        Clear

                    </a>

                    @endif

                    <a href="{{ route('admin.trick-catalog.print-all') }}"
                        target="_blank"
                        class="inline-flex items-center justify-center rounded-md
                                    bg-sp-prairieGreen px-4 py-2 text-sm font-medium text-sp-warmIvory
                                    transition-colors duration-200 hover:bg-sp-prairieOchre uppercase">
                        Print All
                    </a>

                </div>
                <p class="text-sm text-sp-slate">

                    Showing

                    <strong>{{ $tricks->firstItem() ?? 0 }}</strong>

                    –

                    <strong>{{ $tricks->lastItem() ?? 0 }}</strong>

                    of

                    <strong>{{ $tricks->total() }}</strong>

                    behaviors

                </p>

            </div>

        </form>
    </div> <!-- END FILTER AREA -->

    <div
        x-data="behaviorCatalog()"
        class="grid grid-cols-12">

        <div class="col-span-8 py-4">
            <x-admin.behaviors.table :tricks="$tricks" />
            <div class="mt-4">
                {{ $tricks->links() }}
            </div>
        </div>
        <div class="col-span-4 py-4">
            <x-admin.behaviors.detail-card
                selected-behavior="selectedBehavior"
                copy-simple-action="copySimple()"
                copy-grouped-action="copyGrouped()"/>


        </div>
    </div>
</div><!--  End Dashboard content -->

@endsection