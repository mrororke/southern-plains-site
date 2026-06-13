<?php

namespace App\Services\Contact;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactService
{
    public function send(array $data): void
    {
        // 1. Send email
        Mail::to('southernplainssportdogclub@gmail.com')
            ->send(new ContactFormMail($data));

        // 2. Audit log
        app(\App\Services\AuditService::class)->log(
            'form.contact.submitted',
            null,
            null,
            $data
        );
    }
}