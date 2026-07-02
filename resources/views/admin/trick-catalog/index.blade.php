@vite('resources/js/admin/trick-catalog/index.js')

@extends('layouts.portal')

@section('title', 'Trick Catalog')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="font-heading text-4xl pb-2">Trick Catalog</h1>

    <a href="{{ route('admin.trick-catalog.create') }}"
        class="inline-flex items-center px-4 py-2 text-xs uppercase bg-club text-white">
        + New Trick
    </a>
</div>

<form id="catalog-filter-form" method="GET" action="{{ route('admin.trick-catalog.index') }}"
      class="mb-6 border border-black bg-white p-4">

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">

        {{-- Search --}}
        <div>
            <label class="block text-xs font-semibold uppercase mb-1">
                Search
            </label>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Name, notes, creator..."
                class="w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">
        </div>

        {{-- Level --}}
        <div>
            <label class="block text-xs font-semibold uppercase mb-1">
                Level
            </label>

            <select
                name="level"
                class="w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">

                <option value="">All Categories</option>

                @foreach($levels as $level)
                    <option
                        value="{{ $level->id }}"
                        @selected(request('level') == $level->id)>
                        {{ ucwords(str_replace('_', ' ', $level->name)) }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Platform --}}
        <div>
            <label class="block text-xs font-semibold uppercase mb-1">
                Platform
            </label>

            <select
                name="platform"
                class="w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">

                <option value="">All Platforms</option>
                <option value="youtube" @selected(request('platform') == 'youtube')>YouTube</option>
                <option value="tiktok" @selected(request('platform') == 'tiktok')>TikTok</option>
                <option value="instagram" @selected(request('platform') == 'instagram')>Instagram</option>
                <option value="facebook" @selected(request('platform') == 'facebook')>Facebook</option>
                <option value="unknown" @selected(request('platform') == 'unknown')>Unknown</option>

            </select>
        </div>

        {{-- Sort --}}
        <div>
            <label class="block text-xs font-semibold uppercase mb-1">
                Sort
            </label>

            <select
                name="sort"
                class="w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">

                <option value="">Name (A–Z)</option>
                <option value="name_desc" @selected(request('sort') == 'name_desc')>Name (Z–A)</option>
                <option value="newest" @selected(request('sort') == 'newest')>Newest</option>
                <option value="oldest" @selected(request('sort') == 'oldest')>Oldest</option>
                <option value="videos" @selected(request('sort') == 'videos')>Most Videos</option>

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
                <option value="yes" @selected(request('preferred') == 'yes')>Has Preferred Video</option>
                <option value="no" @selected(request('preferred') == 'no')>Missing Preferred Video</option>

            </select>
        </div>

        {{-- Notes --}}
        <div>
            <label class="block text-xs font-semibold uppercase mb-1">
                Notes
            </label>

            <select
                name="notes"
                class="w-full border-gray-300 shadow-sm focus:border-club focus:ring-club">

                <option value="">All</option>
                <option value="has" @selected(request('notes') == 'has')>Has Notes</option>
                <option value="missing" @selected(request('notes') == 'missing')>Missing Notes</option>

            </select>
        </div>

        {{-- Buttons --}}
        <div class="flex items-end gap-2">

            <button
                type="submit"
                class="px-4 py-2 bg-club text-white text-xs uppercase">

                Apply Filters

            </button>

            @if(request()->filled('search')
                || request()->filled('level')
                || request()->filled('platform')
                || request()->filled('preferred')
                || request()->filled('notes')
                || request()->filled('sort'))

                <a
                    href="{{ route('admin.trick-catalog.index') }}"
                    class="px-4 py-2 bg-gray-200 text-xs uppercase">

                    Clear

                </a>

            @endif

        </div>

    </div>

</form>

<div class="flex justify-between items-center mb-4">

    <p class="text-sm text-gray-600">

        Showing

        <strong>{{ $tricks->firstItem() ?? 0 }}</strong>

        –

        <strong>{{ $tricks->lastItem() ?? 0 }}</strong>

        of

        <strong>{{ $tricks->total() }}</strong>

        tricks

    </p>

</div>

<div class="overflow-hidden">

    <table class="w-full text-black border border-black mb-6">

        <thead>
            <tr class="bg-black border-b border-black">
                <th class="p-3 text-left text-white text-xs uppercase">Name</th>
                <th class="p-3 text-left text-white text-xs uppercase">Category</th>
                <th class="p-3 text-left text-white text-xs uppercase">Videos</th>
                <th class="p-3 text-left text-white text-xs uppercase">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tricks as $trick)
            <tr class="border-b border-black hover:bg-gray-50">
                <td class="p-3 font-semibold text-sm">
                    {{ $trick->name }}
                </td>

                <td class="p-3 text-sm">
    {{ $trick->levels
        ->pluck('name')
        ->map(fn($l) => ucwords(str_replace('_', ' ', $l)))
        ->join(', ') }}
</td>

                <td class="p-3 text-sm">
                    {{ $trick->videos->count() }}
                </td>

                <td class="p-3 flex gap-2">
                    <a href="{{ route('admin.trick-catalog.edit', $trick) }}"
                        class="inline-flex items-center px-3 py-1 text-xs bg-training text-white">
                        Edit
                    </a>

                    <button type="button"
                        class="js-open-trick-modal inline-flex items-center px-3 py-1 text-xs bg-club text-white"
                        data-id="{{ $trick->id }}">
                        View
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

<div class="mt-4">
    {{ $tricks->links() }}
</div>

{{-- MODAL --}}
<div id="trickModal"
    class="hidden fixed inset-0 z-[9999] bg-black/60">

    <div class="flex items-center justify-center w-full h-full p-4">

        <div class="w-full max-w-2xl bg-white shadow">

            <div class="flex justify-between items-start p-4 border-b gap-4">

                <h3 id="modalTitle" class="text-2xl font-heading"></h3>

                <div class="flex">
                    <button
                        type="button"
                        class="js-copy-email inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-club text-white hover:bg-club-hover  ms-4"
                        data-type="simple">
                        <span class="copy-label">Copy Simple</span>
                    </button>

                    <button
                        type="button"
                        class="js-copy-email inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training text-white hover:bg-club-training  ms-4"
                        data-type="simple"
                        data-type="grouped">
                        <span class="copy-label">Copy Grouped</span>
                    </button>

                    <button
                        type="button"
                        class="js-copy-email-preferred inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-league text-white hover:bg-club-league  ms-4"
                        data-type="simple">
                        <span class="copy-label">Copy Preferred</span>
                    </button>


                    <!-- CLOSE -->
                    <button type="button" data-close-modal class="px-2 text-black hover:opacity-70">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>
            </div>

            <div class="p-4">
                <div id="modalBody">Loading...</div>
            </div>

        </div>

    </div>
</div>

@endsection