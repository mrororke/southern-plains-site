<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display the main Events Calendar index page.
     */
    public function index()
    {
        // Fetch published events, starting from today, ordered chronologically.
        $events = Event::where('is_published', true)
                       ->where('date', '>=', now()->startOfDay()) // Only show events happening today or in the future
                       ->orderBy('date', 'asc') // Sorting by date
                       ->get();

        return view('events.index', compact('events'));
    }

    /**
     * Display a single event page.
     */
    public function show(Event $event)
    {
        // Ensure the event is published before showing it publicly
        if (!$event->is_published) {
            // If unpublished, check if the authenticated user is an admin
            // (Assuming you have an auth system and an is_admin column on the User model)
            if (!auth()->check() || !auth()->user()->is_admin) {
                abort(404);
            }
        }
        
        return view('events.show', compact('event'));
    }
}