@props([
    'filters' => [],
])

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-7">

        <p class="text-eyebrow">
            Learn
        </p>

        <h1 class="text-hero">
            <span class="block md:inline">
                Learn. Grow.
            </span>

            <span class="block md:inline">
                Do More.
            </span>

            <br class="hidden md:block">

            <span class="block md:inline">
                Together With Your Dog.
            </span>
        </h1>

        <p class="body-large text-sp-slate mt-4 max-w-3xl">
            Explore guides, training advice, real stories, and book reviews from Southern Plains Sport Dog Club.
            Whether you’re training for your next title, building a better partnership, or just love learning
            with your dog, you’ll find something here.
        </p>

    </div>

    {{-- Search + Filters --}}
    <div class="col-span-12 mt-4 md:mt-8">

        {{-- Search --}}
        <form
    role="search"
    method="GET"
    action="{{ route('public-v2.learn.index') }}"
    class="w-full">

    @if (request()->filled('category'))
        <input
            type="hidden"
            name="category"
            value="{{ request()->query('category') }}">
    @endif

    @if (request()->filled('tag'))
        <input
            type="hidden"
            name="tag"
            value="{{ request()->query('tag') }}">
    @endif

            <label
                for="learn-search"
                class="sr-only">
                Search Learn
            </label>

            <div class="relative">

                <x-icons.search
                    class="absolute left-4 top-1/2 w-5 h-5 -translate-y-1/2 text-sp-slate"
                    aria-hidden="true" />

                <input
                    type="search"
                    id="learn-search"
                    name="search"
                    placeholder="Search Learn"
                    value="{{ request()->query('search', '') }}"
                    class="w-full rounded-md border border-sp-warmStone bg-sp-warmIvory py-4 pl-12 pr-4 text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none">

            </div>

        </form>

        {{-- Filters --}}
        <nav
            class="mt-6"
            aria-label="Filter Learn articles">

            <ul class="flex flex-wrap gap-x-8 gap-y-4">

                @foreach ($filters as $filter)

                    <li>

                        <a
                            href="{{ $filter['href'] ?? '#' }}"
                            class="{{ $filter['active'] ?? false
                                ? 'text-sm font-semibold uppercase text-sp-charcoal border-b border-sp-charcoal pb-1'
                                : 'text-sm font-semibold uppercase text-sp-charcoal hover:text-sp-prairieOchre transition-colors' }}"
                            @if ($filter['active'] ?? false)
                                aria-current="page"
                            @endif>

                            {{ $filter['label'] }}

                        </a>

                    </li>

                @endforeach

            </ul>

        </nav>

    </div>

</div>
{{-- End Learn Hero --}}