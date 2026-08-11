<section
    class="border-t border-sp-warmStone px-8 py-8"
>
    <h3
        class="font-sans text-lg font-semibold text-sp-charcoal"
    >
        Related Reading
    </h3>

    <template
        x-if="
            selectedResource.related_resources
            && selectedResource.related_resources.length > 0
        "
    >
        <div class="mt-4 space-y-2">

            <template
                x-for="resource in selectedResource.related_resources"
                :key="resource.id"
            >
                <a
                    :href="`{{ route('admin-v2.resource-library.index') }}?resource=${resource.id}`"
                    class="block rounded-md border border-sp-warmStone
                           bg-sp-warmIvory px-4 py-3
                           transition-colors
                           hover:bg-sp-limestone/20"
                >
                    <p
                        class="font-medium text-sp-charcoal"
                        x-text="resource.title"
                    ></p>
                </a>
            </template>

        </div>
    </template>

    <template
        x-if="
            ! selectedResource.related_resources
            || selectedResource.related_resources.length === 0
        "
    >
        <p
            class="mt-2 text-sm text-sp-slate"
        >
            No related resources connected yet.
        </p>
    </template>

</section>