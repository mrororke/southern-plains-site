<section
    x-show="
        selectedResource?.version_history
        && selectedResource.version_history.length > 1
    "
    class="mt-10 border-t border-sp-warmStone px-8 pt-8 pb-8"
>
    <div class="flex items-baseline justify-between gap-4">

        <h3
            class="font-sans text-lg font-semibold text-sp-charcoal"
        >
            Version History
        </h3>

    </div>


    <div class="mt-5 grid gap-3">

        <template
            x-for="version in selectedResource.version_history"
            :key="version.id"
        >
            <div>

                {{-- Current Version --}}
                <template x-if="version.is_current">
                    <div
                        class="flex items-center justify-between gap-4
                               rounded-md border border-sp-burntClay
                               bg-sp-limestone/40
                               px-5 py-3"
                    >
                        <div class="min-w-0">

                            <p
                                x-show="
                                    version.session
                                    || version.year
                                "
                                class="font-semibold text-sp-charcoal"
                                x-text="
                                    [
                                        version.session
                                            ? version.session
                                                .charAt(0)
                                                .toUpperCase()
                                                + version.session.slice(1)
                                            : null,
                                        version.year
                                    ]
                                        .filter(Boolean)
                                        .join(' ')
                                "
                            ></p>

                            <p
                                x-show="
                                    ! version.session
                                    && ! version.year
                                "
                                class="font-semibold text-sp-charcoal"
                                x-text="version.title"
                            ></p>

                            <div
                                class="mt-1 flex items-center gap-2
                                       text-xs"
                            >
                                <span
                                    x-show="version.week_number"
                                    class="text-sp-slate"
                                    x-text="`Week ${version.week_number}`"
                                ></span>

                                <span
                                    x-show="version.week_number"
                                    aria-hidden="true"
                                    class="text-sp-warmStone"
                                >
                                    ·
                                </span>

                                <span
                                    class="uppercase tracking-wide
                                           text-sp-burntClay"
                                >
                                    Currently Viewing
                                </span>
                            </div>

                        </div>
                    </div>
                </template>


                {{-- Other Versions --}}
                <template x-if="! version.is_current">
                    <a
                        :href="`{{ route('admin.resource-library.index') }}?resource=${version.id}`"
                        class="group flex items-center justify-between gap-4
                               rounded-md border border-sp-warmStone
                               bg-sp-limestone/20
                               px-5 py-3
                               transition-colors
                               hover:border-sp-burntClay
                               hover:bg-sp-limestone/40"
                    >
                        <div class="min-w-0">

                            <p
                                x-show="
                                    version.session
                                    || version.year
                                "
                                class="font-medium text-sp-charcoal
                                       transition-colors
                                       group-hover:text-sp-prairieGreen"
                                x-text="
                                    [
                                        version.session
                                            ? version.session
                                                .charAt(0)
                                                .toUpperCase()
                                                + version.session.slice(1)
                                            : null,
                                        version.year
                                    ]
                                        .filter(Boolean)
                                        .join(' ')
                                "
                            ></p>

                            <p
                                x-show="
                                    ! version.session
                                    && ! version.year
                                "
                                class="font-medium text-sp-charcoal
                                       transition-colors
                                       group-hover:text-sp-prairieGreen"
                                x-text="version.title"
                            ></p>

                            <p
                                x-show="version.week_number"
                                class="mt-1 text-xs text-sp-slate"
                                x-text="`Week ${version.week_number}`"
                            ></p>

                        </div>

                        <x-icons.chevron-right
                            class="h-4 w-4 shrink-0 text-sp-slate
                                   transition-transform
                                   group-hover:translate-x-1"
                        />

                    </a>
                </template>

            </div>
        </template>

    </div>
</section>