<div
    x-data="{
        query: '',
        results: {
    behaviors: {
        label: 'Behaviors',
        items: [],
    },

    resources: {
        label: 'Resources',
        items: [],
    },

    dogs: {
        label: 'Dogs',
        items: [],
    },

    events: {
        label: 'Events',
        items: [],
    },

    users: {
        label: 'Users',
        items: [],
    },
},
        loading: false,
        open: false,

        focusSearch(event) {
            const activeElement = document.activeElement;

            const isTypingField =
                ['INPUT', 'TEXTAREA', 'SELECT'].includes(activeElement.tagName)
                || activeElement.isContentEditable;

            if (event.key === '/' && ! isTypingField) {
                event.preventDefault();
                this.$refs.searchInput.focus();
            }
        },

        async search() {
            const search = this.query.trim();

            if (search.length < 2) {
                this.results = [];
                this.loading = false;
                this.open = false;

                return;
            }

            this.loading = true;
            this.open = true;

            try {
                const response = await fetch(
                    `{{ route('admin-v2.search') }}?search=${encodeURIComponent(search)}`,
                    {
                        headers: {
                            Accept: 'application/json',
                        },
                    }
                );

                if (! response.ok) {
                    throw new Error('Search request failed.');
                }

                this.results = await response.json();
            } catch (error) {
                console.error(error);
                this.results = [];
            } finally {
                this.loading = false;
            }
        },
    }"
    @keydown.escape.window="open = false"
    @keydown.window="focusSearch($event)"
    class="relative">
    <div @input.debounce.300ms="search()">
        <x-admin.search.input />
    </div>

    <div
        x-show="open"
        x-cloak
        @click.outside="open = false">
        <x-admin.search.dropdown>

            <!-- Loading -->
            <div
                x-show="loading"
                class="px-4 py-6 text-center text-sm text-sp-slate">
                Searching…
            </div>

            <!-- Results -->
            <div x-show="! loading && results.behaviors.items.length > 0">

                <div
                    class="border-b border-sp-warmStone bg-sp-limestone
                           px-4 py-2 text-xs font-semibold uppercase
                           tracking-wide text-sp-slate">
                    <span x-text="`${results.behaviors.label} (${results.behaviors.items.length})`"></span>
                </div>

                <template
                    x-for="result in results.behaviors.items"
                    :key="result.url">
                    <a
                        :href="result.url"
                        class="flex items-start gap-3 px-4 py-3
                               transition-colors hover:bg-sp-limestone">
                        <div class="mt-1 shrink-0">
                            <x-icons.paw-print
                                class="h-3.5 w-3.5 text-sp-slate" />
                        </div>

                        <div class="min-w-0 flex-1">
                            <h3
                                class="truncate font-medium text-sp-charcoal"
                                x-text="result.title"></h3>

                            <p
                                x-show="result.description"
                                class="mt-0.5 text-sm text-sp-slate"
                                x-text="result.description"></p>
                        </div>

                        <div class="mt-1 shrink-0">
                            <x-icons.chevron-right
                                class="h-3 w-3 text-sp-slate/60" />
                        </div>
                    </a>
                </template>

            </div>

            <!-- Empty state -->
            <div
                x-show="
                    ! loading
                    && query.trim().length >= 2
                    && results.behaviors.items.length === 0
                ">
                <x-admin.search.empty />
            </div>

        </x-admin.search.dropdown>
    </div>
</div>