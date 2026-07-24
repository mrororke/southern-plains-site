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
        <h1 class="font-heading text-7xl text-sp-deepGranite">Behavior Catalog</h1>
        <a href="{{ route('admin.trick-catalog.create') }}"
            class="inline-flex items-center justify-center rounded-md
                bg-sp-deepGranite px-4 py-2 text-sm font-medium text-sp-softWhite transition-colors duration-200 hover:bg-sp-controlledLime">
            + New Behavior
        </a>
    </div>
    <div> <!-- FILTER AREA -->
        <form id="catalog-filter-form" method="GET" action="{{ route('admin.behavior-catalog.index') }}"
            class="mb-6  p-4">

            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">

                {{-- Search --}}
                <div>
                    <label class="block text-sm text-sp-deepGranite font-semibold uppercase mb-1">
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Name, notes, creator..."
                        class="w-full border-sp-alloyGray shadow-sm rounded-md focus:border-sp-darkGranite focus:ring-sp-darkGranite">
                </div>

                {{-- Level --}}
                <div>
                    <label class="block text-sm text-sp-deepGranite font-semibold uppercase mb-1">
                        Category
                    </label>

                    <select
                        name="level"
                        class="w-full border-sp-alloyGray rounded-md shadow-sm focus:border-sp-darkGranite focus:ring-sp-darkGranite">

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
                    <label class="block text-sm text-sp-deepGranite font-semibold uppercase mb-1">
                        Platform
                    </label>

                    <select
                        name="platform"
                        class="w-full border-sp-alloyGray shadow-sm rounded-md focus:border-sp-darkGranite focus:ring-sp-darkGranite">

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
                    <label class="block text-sm text-sp-deepGranite font-semibold uppercase mb-1">
                        Sort
                    </label>

                    <select
                        name="sort"
                        class="w-full border-sp-alloyGray shadow-sm rounded-md focus:border-sp-darkGranite focus:ring-sp-darkGranite">

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
            <label class="block text-xs font-semibold uppercase mb-1">
                Preferred Video
            </label>

            <select
                name="preferred"
                class="w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">

                <option value="">All</option>
                <option value="yes" @selected(request('preferred')=='yes' )>Has Preferred Video</option>
                <option value="no" @selected(request('preferred')=='no' )>Missing Preferred Video</option>

            </select>
        </div>

                {{-- Notes --}}
                <div>
                    <label class="block text-sm text-sp-deepGranite font-semibold uppercase mb-1">
                        Notes
                    </label>

                    <select
                        name="notes"
                        class="w-full border-sp-alloyGray shadow-sm rounded-md focus:border-sp-darkGranite focus:ring-sp-darkGranite">

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
           bg-sp-deepGranite
           px-4 py-2
           text-sm font-medium text-sp-softWhite
           transition-colors duration-200
           hover:bg-sp-darkGranite uppercase">

                        Apply Filters

                    </button>

                    @if(request()->filled('search')
                    || request()->filled('level')
                    || request()->filled('platform')
                    || request()->filled('is_preferred')
                    || request()->filled('notes')
                    || request()->filled('sort'))

                    <a
                        href="{{ route('admin.behavior-catalog.index') }}"
                        class="inline-flex items-center justify-center rounded-md
           border border-sp-alloyGray
           bg-white
           px-4 py-2
           text-sm font-medium text-sp-darkGranite
           transition-colors duration-200
           hover:bg-sp-softWhite uppercase">

                        Clear

                    </a>

                    @endif

                    <a href="{{ route('admin.trick-catalog.print-all') }}"
                        target="_blank"
                        class="inline-flex items-center justify-center rounded-md
           bg-sp-controlledLime
           px-4 py-2
           text-sm font-semibold text-sp-deepGranite
           transition-colors duration-200
           hover:brightness-95 uppercase">
                        Print All
                    </a>

                </div>
                <p class="text-sm text-sp-darkGranite">

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
        class="grid grid-cols-12 h-full">

        <div class="col-span-8 py-4">
            <x-admin.behaviors.table/>
            <div class="mt-4">
                {{ $tricks->links() }}
            </div>
        </div>
            <div class="col-span-4 py-4">
                <x-admin.behaviors.detail-card/>
            </div>

            
    </div>
</div><!--  End Dashboard content -->

@endsection