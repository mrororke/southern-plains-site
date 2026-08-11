<div class="space-y-8">

    {{-- Resource Details --}}
    <section
        class="rounded-md border border-sp-warmStone
               bg-sp-warmIvory p-6"
    >
        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal"
        >
            Resource Details
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Basic information about this Resource.
        </p>

    </section>


    {{-- Content --}}
    <section
        class="rounded-md border border-sp-warmStone
               bg-sp-warmIvory p-6"
    >
        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal"
        >
            Content
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            The Resource content will be edited here.
        </p>

    </section>


    {{-- Connections --}}
    <section
        class="rounded-md border border-sp-warmStone
               bg-sp-warmIvory p-6"
    >
        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal"
        >
            Connections
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Behaviors and related Resources will be managed here.
        </p>

    </section>


    {{-- Actions --}}
    <div class="flex justify-end gap-4">

        <a
            href="{{ route('admin-v2.resource-library.index') }}"
            class="inline-flex items-center justify-center
                   rounded-md border border-sp-warmStone
                   px-4 py-2 text-sm font-semibold
                   text-sp-charcoal hover:bg-sp-limestone/20"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="inline-flex items-center justify-center
                   rounded-md bg-sp-prairieGreen px-4 py-2
                   text-sm font-semibold
                   text-sp-warmIvory hover:bg-sp-prairieOchre"
        >
            Save Resource
        </button>

    </div>

</div>