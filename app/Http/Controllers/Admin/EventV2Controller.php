<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventV2Request;
use App\Http\Requests\UpdateEventV2Request;
use App\Models\EventV2;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventV2Controller extends Controller
{
    /**
     * Display all V2 events.
     */
    public function index(): View
    {
        $events = EventV2::query()
            ->orderByRaw("
                CASE
                    WHEN start_date >= ? THEN 0
                    ELSE 1
                END
            ", [today()])
            ->orderBy('start_date')
            ->orderBy('id')
            ->paginate(20);

        $eventCounts = [
            'total' => EventV2::count(),

            'published' => EventV2::query()
                ->where('status', 'published')
                ->where(function ($query) {
                    $query
                        ->whereNull('published_at')
                        ->orWhere('published_at', '<=', now());
                })
                ->count(),

            'scheduled' => EventV2::query()
                ->where('status', 'published')
                ->where('published_at', '>', now())
                ->count(),

            'draft' => EventV2::query()
                ->where('status', 'draft')
                ->count(),

            'cancelled' => EventV2::query()
                ->where('status', 'cancelled')
                ->count(),
        ];

        return view('admin.dashboard-v2.events.index', [
            'events' => $events,
            'eventCounts' => $eventCounts,
            'navigation' => \App\Navigation\AdminNavigation::items(),
        ]);
    }

    /**
     * Display the create event form.
     */
    public function create(): View
    {
        return view('admin.dashboard-v2.events.create', [
            'navigation' => \App\Navigation\AdminNavigation::items(),
        ]);
    }

    /**
     * Store a new V2 event.
     */
    public function store(StoreEventV2Request $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title']
        );

        if ($request->hasFile('featured_image')) {
            $validated['featured_image_path'] = $request
                ->file('featured_image')
                ->store('events', 'public');
        }

        unset($validated['featured_image']);

        $event = EventV2::create($validated);

        return redirect()
            ->route('admin.events-v2.edit', $event)
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the edit event form.
     */
    public function edit(EventV2 $event): View
    {
        return view('admin.dashboard-v2.events.edit', [
            'event' => $event,
            'navigation' => \App\Navigation\AdminNavigation::items(),
        ]);
    }

    /**
     * Update an existing V2 event.
     */
    public function update(
        UpdateEventV2Request $request,
        EventV2 $event
    ): RedirectResponse {
        $validated = $request->validated();

        if ($event->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $event
            );
        }

        if ($request->hasFile('featured_image')) {
            if ($event->featured_image_path) {
                Storage::disk('public')->delete(
                    $event->featured_image_path
                );
            }

            $validated['featured_image_path'] = $request
                ->file('featured_image')
                ->store('events', 'public');
        }

        unset($validated['featured_image']);

        $event->update($validated);

        return redirect()
            ->route('admin.events-v2.edit', $event)
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Cancel an event.
     */
    public function cancel(EventV2 $event): RedirectResponse
    {
        $event->update([
            'status' => 'cancelled',
        ]);

        return redirect()
            ->route('admin.events-v2.index')
            ->with('success', 'Event cancelled successfully.');
    }

    /**
     * Delete a V2 event.
     */
    public function destroy(EventV2 $event): RedirectResponse
    {
        if ($event->featured_image_path) {
            Storage::disk('public')->delete(
                $event->featured_image_path
            );
        }

        $event->delete();

        return redirect()
            ->route('admin.events-v2.index')
            ->with('success', 'Event deleted successfully.');
    }

    /**
     * Generate a unique event slug.
     */
    protected function generateUniqueSlug(
        string $title,
        ?EventV2 $event = null
    ): string {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            EventV2::query()
                ->where('slug', $slug)
                ->when(
                    $event,
                    fn ($query) => $query->whereKeyNot($event->id)
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}