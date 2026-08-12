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

                prose-headings:font-sans
                prose-headings:font-semibold
                prose-headings:text-sp-charcoal

                prose-h2:mt-8
                prose-h2:mb-4
                prose-h2:text-2xl
                prose-h2:tracking-tight

                prose-p:text-sp-charcoal
                prose-p:leading-relaxed

                prose-strong:text-sp-charcoal

                prose-a:text-sp-prairieGreen
                prose-a:font-medium
                prose-a:underline
                hover:prose-a:text-sp-burntClay

                prose-ul:my-6
                prose-ul:list-disc
                prose-ul:pl-6

                prose-ol:my-6
                prose-ol:list-decimal
                prose-ol:pl-6

                prose-li:text-sp-charcoal
                prose-li:my-1
                prose-li-p:my-0

                prose-blockquote:border-l-4
                prose-blockquote:border-sp-burntClay
                prose-blockquote:bg-sp-limestone/30
                prose-blockquote:px-4
                prose-blockquote:py-2
                prose-blockquote:not-italic
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