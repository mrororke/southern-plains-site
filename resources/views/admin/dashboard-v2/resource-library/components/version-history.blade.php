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

        <span
            class="text-xs uppercase tracking-wide text-sp-slate"
            x-text="
                `${selectedResource.version_history.length}
                ${selectedResource.version_history.length === 1
                    ? 'version'
                    : 'versions'}`
            "
        ></span>

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
                               px-5 py-4"
                    >
                        <div class="min-w-0">

                            <p
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
                                class="mt-1 text-xs uppercase tracking-wide
                                       text-sp-burntClay"
                            >
                                Current version
                            </p>

                            <p
                                x-show="version.week_number"
                                class="mt-1 text-xs text-sp-slate"
                                x-text="`Week ${version.week_number}`"
                            ></p>

                        </div>
                    </div>
                </template>


                {{-- Other Versions --}}
                <template x-if="! version.is_current">
                    <a
                        :href="`{{ route('admin-v2.resource-library.index') }}?resource=${version.id}`"
                        class="group flex items-center justify-between gap-4
                               rounded-md border border-sp-warmStone
                               bg-sp-limestone/20
                               px-5 py-4
                               transition-colors
                               hover:border-sp-burntClay
                               hover:bg-sp-limestone/40"
                    >
                        <div class="min-w-0">

                            <p
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