<!-- This will be the recent behavior list.<br/>

It should own:
the “Newest Behaviors” section heading;
empty state;
list spacing;
the loop through behaviors.
Because the recent behaviors could eventually appear on desktop too, I would not put this under the mobile component folder. -->

@props([
    'behaviors',
])

<section
    aria-labelledby="recent-behaviors-heading"
    class="mt-4 overflow-hidden rounded-md bg-sp-limestone"
>
    <div class="flex items-center justify-between gap-4 px-5 py-4">
        <h2
            id="recent-behaviors-heading"
            class="font-heading text-3xl text-sp-charcoal"
        >
            Newest Behaviors
        </h2>

        <a
            href="{{ route('admin-v2.behavior-catalog.index') }}"
            class="shrink-0 text-sm font-semibold text-sp-prairieGreen
                   transition-colors hover:text-sp-prairieOchre"
        >
            View all
        </a>
    </div>

    @if($behaviors->isEmpty())
        <div class="border-t border-sp-warmStone px-5 py-6">
            <p class="text-sm text-sp-slate">
                No behaviors have been added yet.
            </p>
        </div>
    @else
        <div class="border-t border-sp-warmStone">
            @foreach($behaviors as $behavior)
                <x-admin.behaviors.compact-item
                    :behavior="$behavior"
                    :last="$loop->last"
                />
            @endforeach
        </div>
    @endif
</section>