<?php

namespace App\Services\HistoryForm;

use App\Mail\HistoryFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class HistoryFormService
{
    public function submit(array $data): void
    {
        try {
            Mail::to('southernplainssportdogclub@gmail.com')
                ->send(new HistoryFormMail($data));
        } catch (\Exception $e) {
            Log::error('History form submission failed: ' . $e->getMessage());

            throw $e;
        }
    }
}