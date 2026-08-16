<?php

namespace App\Support\Inbox;

use App\Models\TrickEvaluation;
use App\Models\Contact;

class InboxTransformer
{
    public static function trick(TrickEvaluation $t): InboxItem
    {
        return new InboxItem(
            id: $t->id,
            type: 'trick_evaluation',
            title: $t->dog_name . ' — Trick Evaluation',
            subtitle: 'Submitted by ' . $t->owner_name,
            status: $t->status,
            status_label: TrickEvaluation::label($t->status),
            status_color: TrickEvaluation::color($t->status),
            link: route('admin.tricks.show', $t),
            created_at: $t->created_at?->format('M d, H:i') ?? '',
        );
    }

    public static function contact(Contact $c): InboxItem
    {
        return new InboxItem(
            id: $c->id,
            type: 'contact',
            title: $c->first_name . ' ' . $c->last_name,
            subtitle: $c->email,
            status: $c->status,
            status_label: ucfirst(str_replace('_', ' ', $c->status)),
            status_color: match ($c->status) {
                'new' => 'bg-blue-100 text-blue-800',
                'in_review' => 'bg-yellow-100 text-yellow-800',
                'closed' => 'bg-gray-100 text-gray-800',
                default => 'bg-gray-100 text-gray-800',
            },
            link: route('admin.contacts.show', $c),
            created_at: $c->created_at?->format('M d, H:i') ?? '',
        );
    }
}