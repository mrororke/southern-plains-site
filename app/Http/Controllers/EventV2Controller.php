<?php

namespace App\Http\Controllers;

use App\Models\EventV2;
use Illuminate\View\View;

class EventV2Controller extends Controller
{
    /**
     * Display the public Events landing page.
     *
     * The next upcoming published event is automatically featured.
     * Remaining upcoming published events are displayed chronologically.
     */
    public function index(): View
    {
        $publishedEvents = EventV2::query()
            ->where('status', 'published')
            ->where(function ($query) {
                $query
                    ->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->where('start_date', '>=', today())
            ->orderBy('start_date')
            ->orderByRaw('start_time IS NULL')
            ->orderBy('start_time')
            ->orderBy('id');

        $featuredEvent = (clone $publishedEvents)
            ->first();

        $upcomingEvents = (clone $publishedEvents)
            ->when(
                $featuredEvent,
                fn ($query) => $query->whereKeyNot($featuredEvent->id)
            )
            ->get();

        return view('public-v2.events.index', [
            'featuredEvent' => $featuredEvent,
            'upcomingEvents' => $upcomingEvents,
        ]);
    }

    /**
     * Display a single published event.
     */
    public function show(EventV2 $event): View
    {
        abort_unless(
            $event->status === 'published'
                && (
                    ! $event->published_at
                    || $event->published_at->lte(now())
                ),
            404
        );

        return view('public-v2.events.show', [
            'event' => $event,
        ]);
    }
}