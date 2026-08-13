<div
    x-show="selectedResource"
    x-cloak
    class="border-b border-sp-warmStone px-8 py-6"
>
    <div class="flex items-start justify-between gap-6">

        {{-- Resource Identity --}}
        <div class="min-w-0">

            <h2
                class="font-sans text-3xl font-semibold leading-tight
                       text-sp-charcoal"
                x-text="selectedResource?.title"
            ></h2>

            <p class="mt-2 text-sm text-sp-slate">

                <span x-text="selectedResource?.type"></span>

                <span aria-hidden="true"> · </span>

                <span x-text="selectedResource?.category"></span>

                <span aria-hidden="true"> · </span>

                <span
                    :class="{
                        'text-sp-successGreen':
                            selectedResource?.status === 'active',
                        'text-sp-warningOchre':
                            selectedResource?.status === 'archived'
                    }"
                    x-text="
                        selectedResource?.status === 'archived'
                            ? 'Archived'
                            : 'Active'
                    "
                ></span>

            </p>

        </div>


        {{-- Delivery + Actions --}}
        <div class="flex shrink-0 flex-col items-end gap-3">

            {{-- Delivery Information --}}
            <p
                x-show="
                    selectedResource?.session
                    || selectedResource?.year
                    || selectedResource?.week_number
                "
                class="text-xs text-sp-slate"
                x-text="
                    [
                        [
                            selectedResource?.session
                                ? selectedResource.session
                                    .charAt(0)
                                    .toUpperCase()
                                    + selectedResource.session.slice(1)
                                : null,
                            selectedResource?.year
                        ]
                            .filter(Boolean)
                            .join(' '),

                        selectedResource?.week_number
                            ? `Week ${selectedResource.week_number}`
                            : null
                    ]
                        .filter(Boolean)
                        .join(' <br/> ')
                "
            ></p>


            {{-- Actions --}}
            <div
                class="relative"
                x-data="{ actionsOpen: false }"
                @click.outside="actionsOpen = false"
            >
                <button
                    type="button"
                    @click="actionsOpen = !actionsOpen"
                    class="inline-flex items-center justify-center
                           rounded-md border border-sp-warmStone
                           bg-white px-4 py-2
                           text-sm font-semibold text-sp-charcoal
                           transition-colors
                           hover:bg-sp-limestone/20"
                >
                    Actions

                    <svg
                        class="ml-2 h-4 w-4 transition-transform"
                        :class="{ 'rotate-180': actionsOpen }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                </button>


                <div
                    x-show="actionsOpen"
                    x-cloak
                    class="absolute right-0 z-10 mt-2 w-48
                           rounded-md border border-sp-warmStone
                           bg-sp-warmIvory py-1 shadow-md"
                >

                    <a
                        :href="selectedResource?.edit_url"
                        class="block px-4 py-2 text-sm text-sp-charcoal
                               hover:bg-sp-limestone/20"
                    >
                        Edit
                    </a>

                    <button
                        type="button"
                        disabled
                        class="flex w-full cursor-not-allowed
                               items-center justify-between
                               px-4 py-2 text-sm text-sp-slate"
                    >
                        Duplicate

                        <span class="text-xs">
                            Soon
                        </span>
                    </button>

                    <button
                        type="button"
                        disabled
                        class="flex w-full cursor-not-allowed
                               items-center justify-between
                               px-4 py-2 text-sm text-sp-slate"
                    >
                        Archive

                        <span class="text-xs">
                            Soon
                        </span>
                    </button>

                    <button
                        type="button"
                        disabled
                        class="flex w-full cursor-not-allowed
                               items-center justify-between
                               px-4 py-2 text-sm text-sp-slate"
                    >
                        Delete

                        <span class="text-xs">
                            Soon
                        </span>
                    </button>

                </div>
            </div>

        </div>

    </div>
</div>