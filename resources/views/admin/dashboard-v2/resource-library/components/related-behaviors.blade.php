<section
    class="mt-10 border-t border-sp-warmStone px-8 pt-8 pb-8"
>
    <div class="flex items-baseline justify-between gap-4">

        <h3
            class="font-sans text-lg font-semibold text-sp-charcoal"
        >
            Related Behaviors
        </h3>

        <span
            x-show="
                selectedResource.tricks
                && selectedResource.tricks.length > 0
            "
            class="text-xs uppercase tracking-wide text-sp-slate"
            x-text="
                `${selectedResource.tricks.length}
                ${selectedResource.tricks.length === 1
                    ? 'behavior'
                    : 'behaviors'}`
            "
        ></span>

    </div>


    <template
        x-if="
            selectedResource.tricks
            && selectedResource.tricks.length > 0
        "
    >

        <div class="mt-5 grid gap-3">

            <template
                x-for="behavior in selectedResource.tricks"
                :key="behavior.id"
            >

                <a
                    :href="behavior.url"
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
                            x-text="behavior.name"
                        ></p>

                        <p
                            class="mt-1 text-xs uppercase tracking-wide
                                   text-sp-slate"
                        >
                            Open behavior
                        </p>

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


    <template
        x-if="
            ! selectedResource.tricks
            || selectedResource.tricks.length === 0
        "
    >

        <div
    class="mt-6 rounded-md border border-sp-warmStone
           bg-sp-limestone/40 px-6 py-5"
>
    <div class="flex items-start gap-4">

        <x-icons.paw-print
            class="mt-1 h-6 w-6 shrink-0 text-sp-prairieOchre"
        />

        <div>
            <p
                class="font-medium text-sp-charcoal"
            >
                No behaviors connected yet.
            </p>

            <p
                class="mt-1 text-sm leading-relaxed text-sp-slate"
            >
                Connect behaviors from the edit screen to build
                training relationships for this Resource.
            </p>
        </div>

    </div>
</div>

    </template>

</section>