<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrickEvaluation\StoreTrickEvaluationRequest;
use App\Services\TrickEvaluation\TrickEvaluationService;
use App\Models\TrickEvaluation;
use App\Services\AuditService;

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

        // 1. STORE submission (new)
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

        // 2. AUDIT LOG (now model-backed)
        app(AuditService::class)->log(
            'trick_evaluation.submitted',
            $evaluation,
            null,
            $data
        );

        // 3. KEEP EXISTING EMAIL FLOW (unchanged)
        $service->submit($data);

        return redirect()
            ->back()
            ->with('success', 'Thank you! Your evaluation request has been submitted successfully.');
    }
}
