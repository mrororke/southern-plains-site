@props([
    'eventCategories',
    'upcomingByCategory',
    'hasPastEvents' => false,
])

{{-- Events Navigation --}}
<aside
    class="hidden md:col-span-3 md:block md:self-start md:sticky md:top-8 md:border-l md:border-sp-warmStone md:pl-6"
    aria-label="Events navigation">

    <nav>

        <p class="font-display font-bold text-2xl text-sp-prairieGreen uppercase">
            Events
        </p>

        <ul class="flex flex-col gap-4 mt-2">

            <li>
                <a
                    href="#upcoming"
                    data-events-nav
                    data-target="upcoming"
                    class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                    Upcoming
                </a>
            </li>

            @foreach ($eventCategories as $type => $label)

                @if ($upcomingByCategory->has($type))

                    <li>
                        <a
                            href="#{{ \Illuminate\Support\Str::slug($label) }}"
                            data-events-nav
                            data-target="{{ \Illuminate\Support\Str::slug($label) }}"
                            class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                            {{ $label }}
                        </a>
                    </li>

                @endif

            @endforeach

            @if ($hasPastEvents)

                <li>
                    <a
                        href="#past-events"
                        data-events-nav
                        data-target="past-events"
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Past Events
                    </a>
                </li>

            @endif

        </ul>

    </nav>

</aside>
{{-- End Events Navigation --}}