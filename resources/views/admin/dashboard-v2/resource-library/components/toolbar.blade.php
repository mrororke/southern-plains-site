<form
    method="GET"
    action="{{ route('admin.resource-library.index') }}"
    class="mb-6 flex flex-wrap items-end gap-3"
>
    {{-- Search --}}
    <div class="min-w-64 flex-1">
        <label
            for="resource-search"
            class="mb-1 block text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Search
        </label>

        <div class="relative">
            <input
                id="resource-search"
                type="search"
                name="search"
                value="{{ request('search') }}"
                autocomplete="off"
                placeholder="Search resources..."
                class="block w-full rounded-md border border-sp-slate
                       bg-transparent pr-10 placeholder:italic
                       placeholder:text-sp-slate focus:border-sp-charcoal"
            >

            <div
                class="pointer-events-none absolute inset-y-0 right-3
                       flex items-center"
            >
                <x-icons.search class="h-4 w-4 text-sp-slate" />
            </div>
        </div>
    </div>

    {{-- Category --}}
    <div class="min-w-40">
        <label
            for="resource-category"
            class="mb-1 block text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Category
        </label>

        <select
            id="resource-category"
            name="category"
            class="block w-full rounded-md border border-sp-slate
                   bg-transparent text-sm text-sp-charcoal
                   focus:border-sp-charcoal"
        >
            <option value="">All Categories</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(
                        (string) request('category')
                        === (string) $category->id
                    )
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Type --}}
    <div class="min-w-40">
        <label
            for="resource-type"
            class="mb-1 block text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Type
        </label>

        <select
            id="resource-type"
            name="type"
            class="block w-full rounded-md border border-sp-slate
                   bg-transparent text-sm text-sp-charcoal
                   focus:border-sp-charcoal"
        >
            <option value="">All Types</option>

            @foreach($types as $type)
                <option
                    value="{{ $type->id }}"
                    @selected(
                        (string) request('type')
                        === (string) $type->id
                    )
                >
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Status --}}
    <div class="min-w-36">
        <label
            for="resource-status"
            class="mb-1 block text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Status
        </label>

        <select
            id="resource-status"
            name="status"
            class="block w-full rounded-md border border-sp-slate
                   bg-transparent text-sm text-sp-charcoal
                   focus:border-sp-charcoal"
        >
            <option
                value=""
                @selected(! request()->has('status'))
            >
                Active
            </option>

            <option
                value="archived"
                @selected(request('status') === 'archived')
            >
                Archived
            </option>

            <option
                value="all"
                @selected(request('status') === 'all')
            >
                All
            </option>
        </select>
    </div>

    {{-- Sort --}}
    <div class="min-w-40">
        <label
            for="resource-sort"
            class="mb-1 block text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Sort
        </label>

        <select
            id="resource-sort"
            name="sort"
            class="block w-full rounded-md border border-sp-slate
                   bg-transparent text-sm text-sp-charcoal
                   focus:border-sp-charcoal"
        >
            <option
                value=""
                @selected(! request('sort'))
            >
                Newest First Sent
            </option>

            <option
                value="oldest"
                @selected(request('sort') === 'oldest')
            >
                Oldest First Sent
            </option>

            <option
                value="title"
                @selected(request('sort') === 'title')
            >
                Title A–Z
            </option>

            <option
                value="title_desc"
                @selected(request('sort') === 'title_desc')
            >
                Title Z–A
            </option>

            <option
                value="updated"
                @selected(request('sort') === 'updated')
            >
                Recently Updated
            </option>
        </select>
    </div>

    {{-- Apply --}}
    <button
        type="submit"
        class="inline-flex items-center justify-center gap-2 rounded-md
               bg-sp-charcoal px-4 py-2 text-sm font-semibold
               text-sp-warmIvory transition-colors
               hover:bg-sp-prairieGreen"
    >
        <x-icons.search class="h-4 w-4" />

        Apply
    </button>

    {{-- Reset --}}
    @if(
        request()->filled('search')
        || request()->filled('category')
        || request()->filled('type')
        || request()->has('status')
        || request()->filled('sort')
    )
        <a
            href="{{ route('admin.resource-library.index') }}"
            class="inline-flex items-center justify-center rounded-md
                   border border-sp-warmStone bg-sp-warmIvory
                   px-4 py-2 text-sm font-semibold text-sp-charcoal
                   transition-colors hover:bg-sp-limestone"
        >
            Reset
        </a>
    @endif

    {{-- New Resource --}}
    <a
        href="{{ route('admin.resource-library.create') }}"
        class="ml-auto inline-flex items-center justify-center gap-2
               rounded-md bg-sp-prairieGreen px-4 py-2
               text-sm font-semibold text-sp-warmIvory
               transition-colors hover:bg-sp-prairieOchre"
    >
        <x-icons.plus class="h-4 w-4" />

        New Resource
    </a>
</form>