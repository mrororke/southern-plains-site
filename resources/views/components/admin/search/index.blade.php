<div
    x-data="{
        query: '',

        results: {
            behaviors: {
                label: 'Behaviors',
                count: 0,
                items: [],
                viewAllUrl: null,
            },

            resources: {
                label: 'Resources',
                count: 0,
                items: [],
                viewAllUrl: null,
            },

            dogs: {
                label: 'Dogs',
                count: 0,
                items: [],
                viewAllUrl: null,
            },

            events: {
                label: 'Events',
                count: 0,
                items: [],
                viewAllUrl: null,
            },

            users: {
                label: 'Users',
                count: 0,
                items: [],
                viewAllUrl: null,
            },
        },

        recentSearches: [],
        loading: false,
        open: false,
        selectedIndex: -1,
        requestNumber: 0,

        init() {
            try {
                const saved = localStorage.getItem(
                    'backendRecentSearches'
                );

                this.recentSearches = saved
                    ? JSON.parse(saved)
                    : [];
            } catch (error) {
                console.error(error);
                this.recentSearches = [];
            }
        },

        emptyResults() {
            return {
                behaviors: {
                    label: 'Behaviors',
                    count: 0,
                    items: [],
                    viewAllUrl: null,
                },

                resources: {
                    label: 'Resources',
                    count: 0,
                    items: [],
                    viewAllUrl: null,
                },

                dogs: {
                    label: 'Dogs',
                    count: 0,
                    items: [],
                    viewAllUrl: null,
                },

                events: {
                    label: 'Events',
                    count: 0,
                    items: [],
                    viewAllUrl: null,
                },

                users: {
                    label: 'Users',
                    count: 0,
                    items: [],
                    viewAllUrl: null,
                },
            };
        },

        liveItems() {
            return [
                ...this.results.behaviors.items,
                ...this.results.resources.items,
                ...this.results.dogs.items,
                ...this.results.events.items,
                ...this.results.users.items,
            ];
        },

        hasLiveResults() {
            return this.liveItems().length > 0;
        },

        currentItems() {
            if (this.query.trim().length < 2) {
                return this.recentSearches;
            }

            return this.liveItems();
        },

        focusSearch(event) {
            const activeElement = document.activeElement;

            const isTypingField =
                ['INPUT', 'TEXTAREA', 'SELECT'].includes(
                    activeElement.tagName
                )
                || activeElement.isContentEditable;

            if (
                event.key === '/'
                && ! isTypingField
            ) {
                event.preventDefault();

                this.$refs.searchInput.focus();
                this.open = true;
            }
        },

        moveSelection(direction) {
            if (! this.open) {
                this.open = true;
            }

            const items = this.currentItems();

            if (items.length === 0) {
                this.selectedIndex = -1;
                return;
            }

            this.selectedIndex += direction;

            if (this.selectedIndex < 0) {
                this.selectedIndex =
                    items.length - 1;
            }

            if (
                this.selectedIndex
                >= items.length
            ) {
                this.selectedIndex = 0;
            }

            this.$nextTick(() => {
                const selected =
                    this.$refs.resultsContainer
                        ?.querySelector(
                            `[data-search-index='${this.selectedIndex}']`
                        );

                selected?.scrollIntoView({
                    block: 'nearest',
                });
            });
        },

        openSelected() {
            const item =
                this.currentItems()[
                    this.selectedIndex
                ];

            if (! item) {
                return;
            }

            this.openResult(item);
        },

        openResult(result) {
            this.saveRecent(result);

            window.location.href =
                result.url;
        },

        saveRecent(result) {
            const recent = {
                type: result.type,
                title: result.title,
                description:
                    result.description ?? '',
                url: result.url,
            };

            this.recentSearches = [
                recent,

                ...this.recentSearches.filter(
                    item =>
                        item.url !== recent.url
                ),
            ].slice(0, 5);

            localStorage.setItem(
                'backendRecentSearches',
                JSON.stringify(
                    this.recentSearches
                )
            );
        },

        async search() {
            const search =
                this.query.trim();

            this.selectedIndex = -1;

            if (search.length < 2) {
                this.results =
                    this.emptyResults();

                this.loading = false;
                this.open = true;

                return;
            }

            const currentRequest =
                ++this.requestNumber;

            this.loading = true;
            this.open = true;

            try {
                const response = await fetch(
                    `{{ route('admin-v2.search') }}?search=${encodeURIComponent(search)}`,
                    {
                        headers: {
                            Accept:
                                'application/json',
                        },
                    }
                );

                if (! response.ok) {
                    throw new Error(
                        'Search request failed.'
                    );
                }

                const data =
                    await response.json();

                if (
                    currentRequest
                    === this.requestNumber
                ) {
                    this.results = data;
                }
            } catch (error) {
                console.error(error);

                if (
                    currentRequest
                    === this.requestNumber
                ) {
                    this.results =
                        this.emptyResults();
                }
            } finally {
                if (
                    currentRequest
                    === this.requestNumber
                ) {
                    this.loading = false;
                }
            }
        },
    }"
    @keydown.escape.window="
        open = false;
        selectedIndex = -1
    "
    @keydown.window="focusSearch($event)"
    @keydown.down.prevent="moveSelection(1)"
    @keydown.up.prevent="moveSelection(-1)"
    @keydown.enter.prevent="openSelected()"
    @click.outside="
        open = false;
        selectedIndex = -1
    "
    class="relative"
>
    <div @input.debounce.300ms="search()">
        <x-admin.search.input />
    </div>

    <div
        x-show="open"
        x-cloak
    >
        <x-admin.search.dropdown>

            <div
                x-ref="resultsContainer"
                class="max-h-96 overflow-y-auto"
            >

                {{-- Idle State --}}
                <div
                    x-show="
                        ! loading
                        && query.trim().length < 2
                    "
                >
                    <template
                        x-if="
                            recentSearches.length > 0
                        "
                    >
                        <section>

                            <div
                                class="border-b border-sp-warmStone
                                       bg-sp-limestone px-4 py-2
                                       text-xs font-semibold uppercase
                                       tracking-wide text-sp-slate"
                            >
                                Recent Searches
                            </div>

                            <template
                                x-for="
                                    (result, index)
                                    in recentSearches
                                "
                                :key="result.url"
                            >
                                <button
                                    type="button"
                                    :data-search-index="index"
                                    @click="
                                        openResult(result)
                                    "
                                    @mouseenter="
                                        selectedIndex = index
                                    "
                                    :class="{
                                        'bg-sp-limestone':
                                            selectedIndex
                                            === index
                                    }"
                                    class="flex w-full items-start
                                           gap-3 px-4 py-3
                                           text-left
                                           transition-colors
                                           hover:bg-sp-limestone"
                                >

                                    <div
                                        class="mt-1 shrink-0"
                                    >
                                        <x-icons.paw-print
                                            class="h-3.5 w-3.5
                                                   text-sp-slate"
                                        />
                                    </div>

                                    <div
                                        class="min-w-0 flex-1"
                                    >
                                        <h3
                                            class="truncate
                                                   font-medium
                                                   text-sp-charcoal"
                                            x-text="
                                                result.title
                                            "
                                        ></h3>

                                        <p
                                            x-show="
                                                result.description
                                            "
                                            class="mt-0.5 text-sm
                                                   text-sp-slate"
                                            x-text="
                                                result.description
                                            "
                                        ></p>
                                    </div>

                                    <div
                                        class="mt-1 shrink-0"
                                    >
                                        <x-icons.chevron-right
                                            class="h-3 w-3
                                                   text-sp-slate/60"
                                        />
                                    </div>

                                </button>
                            </template>

                        </section>
                    </template>

                    <div
                        class="flex items-center
                               justify-between gap-4
                               border-t
                               border-sp-warmStone
                               px-4 py-3
                               text-xs text-sp-slate"
                    >
                        <span>
                            Press / to focus search
                        </span>

                        <span>
                            Esc to close
                        </span>
                    </div>
                </div>


                {{-- Loading --}}
                <div
                    x-show="loading"
                    class="px-4 py-6 text-center
                           text-sm text-sp-slate"
                >
                    Searching…
                </div>


                {{-- Behavior Results --}}
                <div
                    x-show="
                        ! loading
                        && query.trim().length >= 2
                        && results.behaviors.items.length > 0
                    "
                >
                    <x-admin.search.results.group
                        label="Behaviors"
                    >

                        <x-slot:count>
                            <span
                                x-text="
                                    results.behaviors.count
                                "
                            ></span>
                        </x-slot:count>

                        <template
                            x-for="
                                (result, index)
                                in results.behaviors.items
                            "
                            :key="result.url"
                        >
                            <button
                                type="button"
                                :data-search-index="
                                    index
                                "
                                @click="
                                    openResult(result)
                                "
                                @mouseenter="
                                    selectedIndex = index
                                "
                                :class="{
                                    'bg-sp-limestone':
                                        selectedIndex
                                        === index
                                }"
                                class="flex w-full items-start
                                       gap-3 px-4 py-3
                                       text-left
                                       transition-colors
                                       hover:bg-sp-limestone"
                            >

                                <div
                                    class="mt-1 shrink-0"
                                >
                                    <x-icons.paw-print
                                        class="h-3.5 w-3.5
                                               text-sp-slate"
                                    />
                                </div>

                                <div
                                    class="min-w-0 flex-1"
                                >
                                    <h3
                                        class="truncate
                                               font-medium
                                               text-sp-charcoal"
                                        x-text="
                                            result.title
                                        "
                                    ></h3>

                                    <p
                                        x-show="
                                            result.description
                                        "
                                        class="mt-0.5 text-sm
                                               text-sp-slate"
                                        x-text="
                                            result.description
                                        "
                                    ></p>
                                </div>

                                <div
                                    class="mt-1 shrink-0"
                                >
                                    <x-icons.chevron-right
                                        class="h-3 w-3
                                               text-sp-slate/60"
                                    />
                                </div>

                            </button>
                        </template>

                        <a
                            x-show="
                                results.behaviors
                                    .viewAllUrl
                            "
                            :href="
                                results.behaviors
                                    .viewAllUrl
                            "
                            class="flex items-center
                                   justify-between
                                   border-t
                                   border-sp-warmStone
                                   px-4 py-3
                                   text-sm font-semibold
                                   text-sp-prairieGreen
                                   transition-colors
                                   hover:bg-sp-limestone"
                        >
                            <span>
                                View all Behaviors
                            </span>

                            <x-icons.chevron-right
                                class="h-3 w-3"
                            />
                        </a>

                    </x-admin.search.results.group>
                </div>


                {{-- Resource Results --}}
                <div
                    x-show="
                        ! loading
                        && query.trim().length >= 2
                        && results.resources.items.length > 0
                    "
                >
                    <x-admin.search.results.group
                        label="Resources"
                    >

                        <x-slot:count>
                            <span
                                x-text="
                                    results.resources.count
                                "
                            ></span>
                        </x-slot:count>

                        <template
                            x-for="
                                (result, index)
                                in results.resources.items
                            "
                            :key="result.url"
                        >
                            <button
                                type="button"
                                :data-search-index="
                                    results.behaviors.items.length
                                    + index
                                "
                                @click="
                                    openResult(result)
                                "
                                @mouseenter="
                                    selectedIndex =
                                        results.behaviors.items.length
                                        + index
                                "
                                :class="{
                                    'bg-sp-limestone':
                                        selectedIndex ===
                                        (
                                            results.behaviors.items.length
                                            + index
                                        )
                                }"
                                class="flex w-full items-start
                                       gap-3 px-4 py-3
                                       text-left
                                       transition-colors
                                       hover:bg-sp-limestone"
                            >

                                <div
                                    class="mt-1 shrink-0"
                                >
                                    <x-icons.book-open
                                        class="h-3.5 w-3.5
                                               text-sp-slate"
                                    />
                                </div>

                                <div
                                    class="min-w-0 flex-1"
                                >
                                    <h3
                                        class="truncate
                                               font-medium
                                               text-sp-charcoal"
                                        x-text="
                                            result.title
                                        "
                                    ></h3>

                                    <p
                                        x-show="
                                            result.description
                                        "
                                        class="mt-0.5 text-sm
                                               text-sp-slate"
                                        x-text="
                                            result.description
                                        "
                                    ></p>
                                </div>

                                <div
                                    class="mt-1 shrink-0"
                                >
                                    <x-icons.chevron-right
                                        class="h-3 w-3
                                               text-sp-slate/60"
                                    />
                                </div>

                            </button>
                        </template>

                        <a
                            x-show="
                                results.resources
                                    .viewAllUrl
                            "
                            :href="
                                results.resources
                                    .viewAllUrl
                            "
                            class="flex items-center
                                   justify-between
                                   border-t
                                   border-sp-warmStone
                                   px-4 py-3
                                   text-sm font-semibold
                                   text-sp-prairieGreen
                                   transition-colors
                                   hover:bg-sp-limestone"
                        >
                            <span>
                                View all Resources
                            </span>

                            <x-icons.chevron-right
                                class="h-3 w-3"
                            />
                        </a>

                    </x-admin.search.results.group>
                </div>


                {{-- Empty State --}}
                <div
                    x-show="
                        ! loading
                        && query.trim().length >= 2
                        && ! hasLiveResults()
                    "
                >
                    <x-admin.search.empty />
                </div>

            </div>

        </x-admin.search.dropdown>
    </div>
</div>