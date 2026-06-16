<?php

namespace App\Services;

use App\Services\AuditService;
use App\Models\TrickEvaluation;

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
    | AUDIT FEED (recent activity)
    |--------------------------------------------------------------------------
    */
    public function recentActivity(int $limit = 10): array
    {
        return $this->audit->recent($limit);
    }

    /*
    |--------------------------------------------------------------------------
    | WORKFLOW INBOX (Trick Evaluations MVP)
    |--------------------------------------------------------------------------
    |
    | This is the FIRST real “inbox system” piece.
    | Later we will merge contact forms, history forms, etc.
    |
    */
    public function inbox(): array
    {
        return TrickEvaluation::latest()
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

                    'link' => route('admin.tricks.show', $evaluation->id),
                ];
            })
            ->toArray();
    }
}