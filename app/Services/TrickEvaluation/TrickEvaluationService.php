<?php

namespace App\Services\TrickEvaluation;

use App\Mail\TrickEvaluationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TrickEvaluationService
{
    public function submit(array $data): void
    {
        // 1. Send email
        Mail::to('southernplainssportdogclub@gmail.com')
            ->send(new TrickEvaluationMail($data));

        // 2. Audit log
        app(\App\Services\AuditService::class)->log(
            'trick_evaluation.submitted',
            null,
            null,
            $data
        );
    }
}