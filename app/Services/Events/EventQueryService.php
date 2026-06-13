<?php

namespace App\Services\Events;

use App\Models\Event;

class EventQueryService
{
    public function upcoming()
    {
        return Event::query()
            ->where('is_published', true)
            ->where('date', '>=', now()->startOfDay())
            ->orderBy('date', 'asc')
            ->get();
    }

    public function canView(Event $event): bool
    {
        if ($event->is_published) {
            return true;
        }

        return auth()->check() && auth()->user()->is_admin;
    }
}