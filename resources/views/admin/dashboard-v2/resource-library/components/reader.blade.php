<div
    id="resource-reader"
    class="min-h-full rounded-md border border-sp-warmStone
           bg-sp-warmIvory"
>
    <template x-if="! selectedResource">
        <div>
            @include(
                'admin.dashboard-v2.resource-library.components.reader-empty-state'
            )
        </div>
    </template>

    <template x-if="selectedResource">
        <article>

            @include(
                'admin.dashboard-v2.resource-library.components.reader-header'
            )

            <div class="px-8 py-8">

                <div
                    class="prose prose-sm max-w-none
                           prose-headings:text-sp-charcoal
                           prose-p:text-sp-charcoal
                           prose-strong:text-sp-charcoal
                           prose-a:text-sp-prairieGreen
                           prose-li:text-sp-charcoal"
                    x-html="selectedResource.body"
                ></div>

            </div>

        </article>
    </template>
</div>