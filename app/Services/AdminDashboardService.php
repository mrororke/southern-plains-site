<?php

namespace App\Services;

use App\Services\AuditService;
use App\Models\TrickEvaluation;
use App\Models\ContactSubmission;

class AdminDashboardService
{
    protected AuditService $audit;

    public function __construct(AuditService $audit)
    {
        $this->audit = $audit;
    }

    /*
    |--------------------------------------------------------------------------
    | MAIN DASHBOARD DATA
    |--------------------------------------------------------------------------
    */
    public function data(): array
    {
        return [
            'stats' => $this->stats(),
            'recentActivity' => $this->recentActivity(),
            'inbox' => $this->inbox(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TOP STAT CARDS (temporary placeholders)
    |--------------------------------------------------------------------------
    */
    public function stats(): array
    {
        return [
            'active_clients' => 42,
            'total_dogs' => 42,
            'active_programs' => 42,
            'published_posts' => 42,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | AUDIT FEED
    |--------------------------------------------------------------------------
    */
    public function recentActivity(int $limit = 10): array
    {
        return $this->audit->recent($limit);
    }

    /*
    |--------------------------------------------------------------------------
    | MAIN INBOX (Unified Feed)
    |--------------------------------------------------------------------------
    | Combines:
    | - Trick Evaluations
    | - Contact Form Submissions
    |--------------------------------------------------------------------------
    */
    public function inbox(): array
    {
        $tricks = TrickEvaluation::orderByDesc('created_at')
            ->take(10)
            ->get()
            ->map(function (TrickEvaluation $evaluation) {

                return [
                    'title' => $evaluation->dog_name . ' — ' . $evaluation->owner_name,
                    'subtitle' => 'Level: ' . $evaluation->trick_level,

                    'status' => $evaluation->status,
                    'status_label' => TrickEvaluation::label($evaluation->status),
                    'status_color' => TrickEvaluation::color($evaluation->status),

                    'created_at' => optional($evaluation->created_at)
                        ->format('M d, H:i'),

                    'link' => route('admin.tricks.show', $evaluation),
                ];
            })
            ->toArray();

        $contacts = $this->contactsInbox();

        return array_merge($tricks, $contacts);
    }

    /*
    |--------------------------------------------------------------------------
    | CONTACT INBOX
    |--------------------------------------------------------------------------
    */
    public function contactsInbox(): array
{
    return ContactSubmission::latest()
        ->take(10)
        ->get()
        ->map(function (ContactSubmission $contact) {

            return [
                'title' => $contact->name . ' — ' . $contact->email,
                'subtitle' => $contact->subject ?? 'Contact Form Submission',

                'status' => $contact->status,
                'status_label' => ucfirst($contact->status),
                'status_color' => match ($contact->status) {
                    'new' => 'bg-blue-500',
                    'in_progress' => 'bg-yellow-500',
                    'resolved' => 'bg-green-500',
                    default => 'bg-gray-400',
                },

                'created_at' => optional($contact->created_at)
                    ->format('M d, H:i'),

                'link' => route('admin.contacts.show', $contact),
            ];
        })
        ->toArray();
}
}