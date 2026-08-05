@props([
    'levels',
])

@php
    $inputClasses = '
        w-full rounded-md border border-sp-slate bg-transparent
        focus:border-sp-charcoal
    ';

    $hasActiveFilters = collect([
        'search',
        'level',
        'platform',
        'preferred',
        'notes',
        'sort',
    ])->contains(fn ($filter) => request()->filled($filter));
@endphp

<!-- FILTER AREA -->
<form
    id="catalog-filter-form"
    method="GET"
    action="{{ route('admin-v2.behavior-catalog.index') }}"
    class="mb-6 rounded-md bg-sp-warmIvory p-4"
>
    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">

        {{-- Search --}}
        <div>
            <label
                for="behavior-search"
                class="mb-1 block text-xs font-semibold uppercase text-sp-slate"
            >
                Search
            </label>

            <input
                id="behavior-search"
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Name, notes, creator..."
                class="{{ $inputClasses }}
                       placeholder:text-md placeholder:italic
                       placeholder:text-sp-slate"
            >
        </div>

        {{-- Category --}}
        <div>
            <label
                for="behavior-category"
                class="mb-1 block text-xs font-semibold uppercase text-sp-slate"
            >
                Category
            </label>

            <select
                id="behavior-category"
                name="level"
                class="{{ $inputClasses }}"
            >
                <option value="">
                    All Categories
                </option>

                <option
                    value="none"
                    @selected(request('level') === 'none')
                >
                    No Category
                </option>

                @foreach($levels as $level)
                    <option
                        value="{{ $level->id }}"
                        @selected(request('level') == $level->id)
                    >
                        {{ ucwords(str_replace('_', ' ', $level->name)) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Platform --}}
        <div>
            <label
                for="behavior-platform"
                class="mb-1 block text-xs font-semibold uppercase text-sp-slate"
            >
                Platform
            </label>

            <select
                id="behavior-platform"
                name="platform"
                class="{{ $inputClasses }}"
            >
                <option value="">
                    All Platforms
                </option>

                <option
                    value="youtube"
                    @selected(request('platform') === 'youtube')
                >
                    YouTube
                </option>

                <option
                    value="tiktok"
                    @selected(request('platform') === 'tiktok')
                >
                    TikTok
                </option>

                <option
                    value="instagram"
                    @selected(request('platform') === 'instagram')
                >
                    Instagram
                </option>

                <option
                    value="facebook"
                    @selected(request('platform') === 'facebook')
                >
                    Facebook
                </option>

                <option
                    value="unknown"
                    @selected(request('platform') === 'unknown')
                >
                    Unknown
                </option>
            </select>
        </div>

        {{-- Sort --}}
        <div>
            <label
                for="behavior-sort"
                class="mb-1 block text-xs font-semibold uppercase text-sp-slate"
            >
                Sort
            </label>

            <select
                id="behavior-sort"
                name="sort"
                class="{{ $inputClasses }}"
            >
                <option value="">
                    Name (A–Z)
                </option>

                <option
                    value="name_desc"
                    @selected(request('sort') === 'name_desc')
                >
                    Name (Z–A)
                </option>

                <option
                    value="newest"
                    @selected(request('sort') === 'newest')
                >
                    Newest
                </option>

                <option
                    value="oldest"
                    @selected(request('sort') === 'oldest')
                >
                    Oldest
                </option>

                <option
                    value="videos"
                    @selected(request('sort') === 'videos')
                >
                    Most Videos
                </option>
            </select>
        </div>

    </div>

    <div class="mt-4 grid gap-4 md:grid-cols-3">

        {{-- Preferred Video --}}
        <div>
            <label
                for="behavior-preferred"
                class="mb-1 block text-xs font-semibold uppercase text-sp-slate"
            >
                Preferred Video
            </label>

            <select
                id="behavior-preferred"
                name="preferred"
                class="{{ $inputClasses }}"
            >
                <option value="">
                    All
                </option>

                <option
                    value="yes"
                    @selected(request('preferred') === 'yes')
                >
                    Has Preferred Video
                </option>

                <option
                    value="no"
                    @selected(request('preferred') === 'no')
                >
                    Missing Preferred Video
                </option>
            </select>
        </div>

        {{-- Notes --}}
        <div>
            <label
                for="behavior-notes"
                class="mb-1 block text-xs font-semibold uppercase text-sp-slate"
            >
                Notes
            </label>

            <select
                id="behavior-notes"
                name="notes"
                class="{{ $inputClasses }}"
            >
                <option value="">
                    All
                </option>

                <option
                    value="has"
                    @selected(request('notes') === 'has')
                >
                    Has Notes
                </option>

                <option
                    value="missing"
                    @selected(request('notes') === 'missing')
                >
                    Missing Notes
                </option>
            </select>
        </div>

        {{-- Actions --}}
        <div class="flex items-end gap-2">

            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-md
                       bg-sp-prairieGreen px-4 py-2 text-sm font-medium
                       uppercase text-sp-warmIvory transition-colors
                       duration-200 hover:bg-sp-prairieOchre"
            >
                Apply Filters
            </button>

            @if($hasActiveFilters)
                <a
                    href="{{ route('admin-v2.behavior-catalog.index') }}"
                    class="inline-flex items-center justify-center rounded-md
                           border border-sp-limestone bg-sp-warmIvory
                           px-4 py-2 text-sm font-medium uppercase
                           text-sp-prairieGreen transition-colors duration-200
                           hover:bg-sp-prairieOchre hover:text-sp-warmIvory"
                >
                    Clear
                </a>
            @endif

            <a
                href="{{ route('admin.trick-catalog.print-all') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center justify-center rounded-md
                       bg-sp-prairieGreen px-4 py-2 text-sm font-medium
                       uppercase text-sp-warmIvory transition-colors
                       duration-200 hover:bg-sp-prairieOchre"
            >
                Print All
            </a>

        </div>

    </div>
</form>
<!-- END FILTER AREA -->