<?php

namespace App\Services\HistoryForm;

use App\Mail\HistoryFormMail;
use Illuminate\Support\Facades\Mail;

class HistoryFormService
{
    public function submit(array $data): void
    {
        // 1. Send email
        Mail::to('southernplainssportdogclub@gmail.com')
            ->send(new HistoryFormMail($data));

        // 2. Audit log
        app(\App\Services\AuditService::class)->log(
            'form.history.submitted',
            null,
            null,
            $data
        );
    }
}