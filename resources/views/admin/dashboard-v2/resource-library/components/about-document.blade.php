<section
    class="border-t border-sp-warmStone px-8 py-8"
>
    <h3
        class="font-sans text-lg font-semibold text-sp-charcoal"
    >
        About This Document
    </h3>

    <dl
        class="mt-6 grid grid-cols-2 gap-x-8 gap-y-6 text-sm"
    >

        <div>
            <dt class="text-sp-slate">
                Category
            </dt>

            <dd
                class="font-medium text-sp-charcoal"
                x-text="selectedResource?.category"
            ></dd>
        </div>

        <div>
            <dt class="text-sp-slate">
                Type
            </dt>

            <dd
                class="mt-1 font-medium text-sp-charcoal"
                x-text="selectedResource?.type"
            ></dd>
        </div>

        <div>
            <dt class="text-sp-slate">
                Status
            </dt>

            <dd
                class="mt-1 font-medium text-sp-charcoal"
                x-text="
                    selectedResource?.status === 'archived'
                        ? 'Archived'
                        : 'Active'
                "
            ></dd>
        </div>

        <div>
            <dt class="text-sp-slate">
                First Sent
            </dt>

            <dd
                class="mt-1 font-medium text-sp-charcoal"
                x-text="selectedResource?.first_sent"
            ></dd>
        </div>

    </dl>
</section>