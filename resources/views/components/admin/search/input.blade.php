<label
    for="global-search"
    class="sr-only">
    Search the backend
</label>

<div class="relative">

    <input
        id="global-search"
        type="search"
        name="search"
        autocomplete="off"
        spellcheck="false"
        placeholder="Search anything..."
        class="mt-1 block w-full rounded-md
               border border-sp-slate
               bg-transparent
               pr-10
               placeholder:text-md
               placeholder:italic
               placeholder:text-sp-slate
               focus:border-sp-charcoal">

    <div
        class="pointer-events-none absolute inset-y-0 right-3 flex items-center">

        <x-icons.search
            class="h-4 w-4 text-sp-slate" />

    </div>

</div>