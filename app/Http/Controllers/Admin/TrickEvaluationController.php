<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrickEvaluation;
use App\Services\AuditService;
use Illuminate\Http\Request;

class TrickEvaluationController extends Controller
{
    public function index(Request $request)
    {
        $query = TrickEvaluation::query();

if ($request->filled('status')) {
    $query->where('status', $request->status);
}

$evaluations = $query
    ->orderByRaw("
        CASE status
            WHEN 'new' THEN 1
            WHEN 'in_review' THEN 2
            WHEN 'awaiting_client' THEN 3
            WHEN 'completed' THEN 4
            WHEN 'archived' THEN 5
        END
    ")
    ->latest('created_at')
    ->paginate(20)
    ->withQueryString();
        $stats = [
        'new' => TrickEvaluation::where('status', 'new')->count(),
        'in_review' => TrickEvaluation::where('status', 'in_review')->count(),
        'awaiting_client' => TrickEvaluation::where('status', 'awaiting_client')->count(),
        'completed' => TrickEvaluation::where('status', 'completed')->count(),
        'archived' => TrickEvaluation::where('status', 'archived')->count(),
    ];

    return view('admin.tricks.index', compact(
        'evaluations',
        'stats'
    ));

    }

    public function show(TrickEvaluation $trickEvaluation)
    {

        return view('admin.submissions.show', [
            'submission' => $trickEvaluation,
            'title' => 'Trick Evaluation — ' . $trickEvaluation->dog_name,

            'created_at' => $trickEvaluation->created_at->format('M d, H:i'),

            'summary' => "{$trickEvaluation->owner_name} submitted a {$trickEvaluation->trick_level} evaluation",

            'fields' => [
                'Owner' => $trickEvaluation->owner_name,
                'Email' => $trickEvaluation->email,
                'Dog' => $trickEvaluation->dog_name,
                'Level' => $trickEvaluation->trick_level,
                'Method' => $trickEvaluation->eval_method,
                'Video' => $trickEvaluation->video_link,
                'Scheduled' => $trickEvaluation->scheduled_datetime,
                'Payment Method' => $trickEvaluation->payment_method,
                'Total Fee' => $trickEvaluation->total_fee,
                'Status' => $trickEvaluation->status,
            ],

            'diff' => [],
        ]);
    }

    public function updateStatus(
    Request $request,
    TrickEvaluation $trickEvaluation,
    AuditService $auditService
) {
    $request->validate([
    'status' => [
        'required',
        'in:new,in_review,awaiting_client,completed,archived',
    ],
]);

    $oldStatus = $trickEvaluation->status;

    $trickEvaluation->update([
        'status' => $request->status,
    ]);

    $auditService->log(
        'trick_evaluation.status_changed',
        $trickEvaluation,
        ['status' => $oldStatus],
        ['status' => $request->status]
    );

    return back()->with('success', 'Status updated.');
}

}
