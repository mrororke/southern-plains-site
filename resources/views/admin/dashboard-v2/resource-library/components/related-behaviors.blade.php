<section
    class="border-t border-sp-warmStone px-8 py-8"
    x-show="
        selectedResource?.tricks
        && selectedResource.tricks.length
    ">
    <h3
        class="font-sans text-lg font-semibold text-sp-charcoal">
        Related Behaviors
    </h3>

    <div class="mt-4 space-y-2">

        <template
            x-for="trick in selectedResource.tricks"
            :key="trick.id">
            <a
                :href="trick.url"
                class="block rounded-md bg-sp-limestone
           px-4 py-3 transition-colors
           hover:bg-sp-warmStone">
                <p
                    class="text-sm font-medium text-sp-charcoal"
                    x-text="trick.name"></p>

                <p class="mt-1 text-xs text-sp-slate">
                    View behavior details
                </p>
            </a>
        </template>

    </div>
</section>

<section
    x-show="
        !selectedResource?.tricks
        || selectedResource.tricks.length === 0
    "
    class="border-t border-sp-warmStone px-8 py-8">
    <h3
        class="font-sans text-lg font-semibold text-sp-charcoal">
        Related Behaviors
    </h3>

    <p class="mt-2 text-sm text-sp-slate">
        No behaviors connected yet.<br />
        Connect behaviors when editing this Resource.
    </p>
</section>