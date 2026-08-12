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

            <div class="px-8 pt-10 pb-8">

                <div
    class="prose prose-sm max-w-none
           prose-headings:text-sp-charcoal
           prose-p:text-sp-charcoal
           prose-strong:text-sp-charcoal
           prose-a:text-sp-prairieGreen
           prose-li:text-sp-charcoal
           prose-ul:list-disc
           prose-ul:pl-6
           prose-ol:list-decimal
           prose-ol:pl-6
           prose-blockquote:border-l-4
           prose-blockquote:border-sp-burntClay
           prose-blockquote:pl-4
           prose-blockquote:italic
           prose-blockquote:text-sp-slate"
    x-html="selectedResource.body"
></div>

                @include(
                    'admin.dashboard-v2.resource-library.components.related-behaviors'
                )

                @include(
                    'admin.dashboard-v2.resource-library.components.related-reading'
                )

                @include(
                    'admin.dashboard-v2.resource-library.components.about-document'
                )

            </div>

        </article>
    </template>
</div>