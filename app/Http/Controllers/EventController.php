<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\Events\EventQueryService;

class EventController extends Controller
{
    public function index(EventQueryService $service)
    {
        $events = $service->upcoming();

        return view('events.index', compact('events'));
    }

    public function show(Event $event, EventQueryService $service)
    {
        abort_unless(
            $service->canView($event),
            404
        );

        return view('events.show', compact('event'));
    }
}