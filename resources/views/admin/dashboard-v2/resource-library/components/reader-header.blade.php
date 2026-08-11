<div
    x-show="selectedResource"
    x-cloak
    class="border-b border-sp-warmStone px-8 py-6"
>
    <div class="flex items-start justify-between gap-6">

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

        <div class="shrink-0">

            <a
                :href="selectedResource?.edit_url"
                class="inline-flex items-center justify-center rounded-md
                       bg-sp-prairieGreen px-4 py-2 text-sm font-semibold
                       text-sp-warmIvory transition-colors
                       hover:bg-sp-prairieOchre"
            >
                Edit
            </a>

        </div>

    </div>
</div>