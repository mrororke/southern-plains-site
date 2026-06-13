<?php

namespace App\Services\Contact;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactService
{
    public function send(array $data): void
    {
        try {
            Mail::to('southernplainssportdogclub@gmail.com')
                ->send(new ContactFormMail($data));
        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());

            throw $e;
        }
    }
}