<section
    x-show="
        selectedResource?.series !== 'No Series'
        && selectedResource?.series_resources
        && selectedResource.series_resources.length > 1
    "
    class="mt-10 border-t border-sp-warmStone px-8 pt-8 pb-8"
>
    <div class="flex items-baseline justify-between gap-4">

        <div>
            <h3
                class="font-sans text-lg font-semibold
                       text-sp-charcoal"
            >
                More in this Series
            </h3>

            <p
                class="mt-1 text-sm text-sp-slate"
                x-text="selectedResource?.series"
            ></p>
        </div>

        <span
            class="text-xs uppercase tracking-wide text-sp-slate"
            x-text="
                `${selectedResource.series_resources.length}
                ${selectedResource.series_resources.length === 1
                    ? 'resource'
                    : 'resources'}`
            "
        ></span>

    </div>


    <div class="mt-5 grid gap-3">

        <template
            x-for="resource in selectedResource.series_resources"
            :key="resource.id"
        >

            <template
                x-if="resource.id === selectedResource.id"
            >
                <div
                    class="flex items-center justify-between gap-4
                           rounded-md border border-sp-burntClay
                           bg-sp-limestone/40
                           px-5 py-4"
                >

                    <div class="min-w-0">

                        <p
                            class="font-semibold text-sp-charcoal"
                            x-text="resource.title"
                        ></p>

                        <p
                            class="mt-1 text-xs uppercase tracking-wide
                                   text-sp-burntClay"
                        >
                            Current resource
                        </p>

                    </div>

                </div>
            </template>


            <template
                x-if="resource.id !== selectedResource.id"
            >
                <a
                    :href="`{{ route('admin-v2.resource-library.index') }}?resource=${resource.id}`"
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
                            x-text="resource.title"
                        ></p>

                        <p
                            class="mt-1 text-xs uppercase tracking-wide
                                   text-sp-slate"
                        >
                            Open resource
                        </p>

                    </div>

                    <x-icons.chevron-right
                        class="h-4 w-4 shrink-0 text-sp-slate
                               transition-transform
                               group-hover:translate-x-1"
                    />

                </a>
            </template>

        </template>

    </div>
</section>