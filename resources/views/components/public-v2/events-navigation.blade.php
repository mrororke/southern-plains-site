@props([
    'eventCategories',
    'upcomingByCategory',
    'hasPastEvents' => false,
])

<nav
    class="sticky top-6"
    aria-label="Events navigation">

    <p class="text-eyebrow">
        Events
    </p>

    <ul class="mt-4 space-y-1">

        <li>
            <a
                href="#upcoming"
                data-events-nav
                class="events-nav-link"
            >
                Upcoming
            </a>
        </li>

        @foreach ($eventCategories as $type => $label)

            @if ($upcomingByCategory->has($type))

                <li>
                    <a
                        href="#{{ \Illuminate\Support\Str::slug($label) }}"
                        data-events-nav
                        class="events-nav-link"
                    >
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
                    class="events-nav-link"
                >
                    Past Events
                </a>
            </li>

        @endif

    </ul>

</nav>

