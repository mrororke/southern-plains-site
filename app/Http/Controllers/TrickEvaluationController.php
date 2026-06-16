<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrickEvaluation\StoreTrickEvaluationRequest;
use App\Services\TrickEvaluation\TrickEvaluationService;
use App\Services\AuditService;
use App\Models\TrickEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrickEvaluationController extends Controller
{
    public function create()
    {
        return view('emails.trickevaluations.create');
    }

    public function store(
        StoreTrickEvaluationRequest $request,
        TrickEvaluationService $service
    ) {
        $data = $request->validated();

        // Store submission
        $evaluation = TrickEvaluation::create([
            'owner_name' => $data['owner_name'],
            'email' => $data['email'],
            'dog_name' => $data['dog_name'],
            'dog_number' => $data['dog_number'] ?? null,
            'trick_level' => $data['trick_level'],
            'eval_method' => $data['eval_method'],
            'video_link' => $data['video_link'] ?? null,
            'scheduled_datetime' => $data['scheduled_datetime'] ?? null,
            'additional_dogs' => isset($data['additional_dog_names'])
                ? json_encode($data['additional_dog_names'])
                : null,
            'payment_method' => $data['payment_method'] ?? null,
            'total_fee' => $data['total_fee'] ?? null,
        ]);

        // Audit log
        app(AuditService::class)->log(
            'trick_evaluation.submitted',
            $evaluation,
            null,
            $data
        );

        // Existing email workflow
        $service->submit($data);

        return redirect()
            ->back()
            ->with(
                'success',
                'Thank you! Your evaluation request has been submitted successfully.'
            );
    }

    public function storeNote(
    Request $request,
    TrickEvaluation $trickEvaluation,
    AuditService $auditService
) {
    $request->validate([
        'body' => 'required|string',
    ]);

    $note = $trickEvaluation->notes()->create([
        'body' => $request->body,
        'user_id' => Auth::id(),
    ]);

    $auditService->log(
        'trick_evaluation.note_added',
        $trickEvaluation,
        null,
        [
            'note_id' => $note->id,
            'note_preview' => str($note->body)->limit(100),
        ]
    );

    return back();
}
}