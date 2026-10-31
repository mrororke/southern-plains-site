<?php

namespace App\Http\Controllers;

use App\Models\EventV2;
use Illuminate\View\View;

class EventV2Controller extends Controller
{
    /**
     * Display the public Events archive.
     */
    public function index(): View
    {
        $publishedEvents = EventV2::query()
            ->where('status', 'published')
            ->where(function ($query) {
                $query
                    ->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });

        $upcomingEvents = (clone $publishedEvents)
            ->whereDate('start_date', '>=', today())
            ->orderBy('start_date')
            ->orderBy('start_time')
            ->orderBy('id')
            ->get();

        $pastEvents = (clone $publishedEvents)
            ->whereDate('start_date', '<', today())
            ->orderByDesc('start_date')
            ->orderByDesc('start_time')
            ->orderByDesc('id')
            ->get();

        return view('public-v2.events.index', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
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