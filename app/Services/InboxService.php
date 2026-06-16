<?php

namespace App\Services;

use App\Models\TrickEvaluation;
use App\Models\Contact;
use App\Support\Inbox\InboxTransformer;

class InboxService
{
    public function all()
    {
        $tricks = TrickEvaluation::latest()->get()
            ->map(fn ($t) => InboxTransformer::trick($t));

        $contacts = Contact::latest()->get()
            ->map(fn ($c) => InboxTransformer::contact($c));

        return $tricks
            ->merge($contacts)
            ->sortByDesc(fn ($item) => $item->created_at)
            ->values()
            ->map(fn ($item) => $item->toArray());
    }
}