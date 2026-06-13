<?php

namespace App\Services\TrickEvaluation;

use App\Mail\TrickEvaluationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TrickEvaluationService
{
    public function submit(array $data): void
    {
        try {
            Mail::to('southernplainssportdogclub@gmail.com')
                ->send(new TrickEvaluationMail($data));
        } catch (\Exception $e) {
            Log::error('Trick evaluation submission failed: ' . $e->getMessage());

            throw $e;
        }
    }
}