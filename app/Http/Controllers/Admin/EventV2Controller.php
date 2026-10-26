<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventV2;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventV2Controller extends Controller
{
    /**
     * Display all V2 events.
     */
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateEvent($request);

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
        Request $request,
        EventV2 $event
    ): RedirectResponse {
        $validated = $this->validateEvent($request, $event);

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
     * Validate event data.
     */
    protected function validateEvent(
        Request $request,
        ?EventV2 $event = null
    ): array {
        return $request->validate([
            'type' => [
                'required',
                'string',
                'in:dog_sports,training,workshop,class,community,other',
            ],

            'status' => [
                'required',
                'string',
                'in:draft,published,cancelled',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'description' => [
                'required',
                'string',
            ],

            'featured_image' => [
                'nullable',
                'image',
                'max:10240',
            ],

            'featured_image_alt' => [
                'nullable',
                'string',
                'max:255',
            ],

            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date',
            ],

            'start_time' => [
                'nullable',
                'date_format:H:i',
            ],

            'end_time' => [
                'nullable',
                'date_format:H:i',
            ],

            'venue_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'city' => [
                'required',
                'string',
                'max:255',
            ],

            'state' => [
                'required',
                'string',
                'max:255',
            ],

            'is_private_location' => [
                'nullable',
                'boolean',
            ],

            'location_details' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'registration_status' => [
                'required',
                'string',
                'in:not_required,open,coming_soon,closed',
            ],

            'registration_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'registration_deadline' => [
                'nullable',
                'date',
            ],

            'registration_notes' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'what_to_expect' => [
                'nullable',
                'string',
            ],

            'what_to_bring' => [
                'nullable',
                'string',
            ],

            'requirements_notes' => [
                'nullable',
                'string',
            ],

            'cta_label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'cta_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'seo_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'seo_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ]);
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
                    fn($query) => $query->whereKeyNot($event->id)
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}