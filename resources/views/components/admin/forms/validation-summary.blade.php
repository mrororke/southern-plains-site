@if($errors->any())
    <div
        {{ $attributes->class(
            'mb-6 rounded-md border border-sp-burntClay
             bg-sp-burntClay/10 px-5 py-4'
        ) }}
        role="alert"
    >
        <div class="flex items-start gap-3">
            <x-icons.circle-alert
                class="mt-0.5 h-4 w-4 shrink-0 text-sp-burntClay"
            />

            <div>
                <h2 class="font-semibold text-sp-charcoal">
                    Please review the form.
                </h2>

                <ul
                    class="mt-2 list-disc space-y-1 pl-5
                           text-sm text-sp-slate"
                >
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif