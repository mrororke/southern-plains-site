<section
    class="mt-10 border-t border-sp-warmStone px-8 pt-8 pb-8"
>
    <h3
        class="font-sans text-lg font-semibold text-sp-charcoal"
    >
        About This Document
    </h3>

    <div
        class="mt-6 rounded-md border border-sp-warmStone
               bg-sp-limestone/20 px-6 py-5"
    >
        <dl
            class="grid grid-cols-2 gap-x-8 gap-y-6"
        >

            <div>
                <dt
                    class="text-xs font-semibold uppercase
                           tracking-wide text-sp-slate"
                >
                    Category
                </dt>

                <dd
                    class="mt-1 text-sm font-medium text-sp-charcoal"
                    x-text="selectedResource?.category"
                ></dd>
            </div>


            <div>
                <dt
                    class="text-xs font-semibold uppercase
                           tracking-wide text-sp-slate"
                >
                    Type
                </dt>

                <dd
                    class="mt-1 text-sm font-medium text-sp-charcoal"
                    x-text="selectedResource?.type"
                ></dd>
            </div>


            <div>
                <dt
                    class="text-xs font-semibold uppercase
                           tracking-wide text-sp-slate"
                >
                    Series
                </dt>

                <dd
                    class="mt-1 text-sm font-medium text-sp-charcoal"
                    x-text="selectedResource?.series ?? 'No Series'"
                ></dd>
            </div>


            <div>
                <dt
                    class="text-xs font-semibold uppercase
                           tracking-wide text-sp-slate"
                >
                    Status
                </dt>

                <dd
                    class="mt-1 text-sm font-medium text-sp-charcoal"
                    x-text="
                        selectedResource?.status === 'archived'
                            ? 'Archived'
                            : 'Active'
                    "
                ></dd>
            </div>


            <div>
                <dt
                    class="text-xs font-semibold uppercase
                           tracking-wide text-sp-slate"
                >
                    First Sent
                </dt>

                <dd
                    class="mt-1 text-sm font-medium text-sp-charcoal"
                    x-text="selectedResource?.first_sent"
                ></dd>
            </div>


            <div>
                <dt
                    class="text-xs font-semibold uppercase
                           tracking-wide text-sp-slate"
                >
                    Created
                </dt>

                <dd
                    class="mt-1 text-sm font-medium text-sp-charcoal"
                    x-text="selectedResource?.created_at"
                ></dd>
            </div>


            <div>
                <dt
                    class="text-xs font-semibold uppercase
                           tracking-wide text-sp-slate"
                >
                    Last Updated
                </dt>

                <dd
                    class="mt-1 text-sm font-medium text-sp-charcoal"
                    x-text="selectedResource?.updated_at"
                ></dd>
            </div>

        </dl>
    </div>
</section>