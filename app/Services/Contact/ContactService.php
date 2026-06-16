<?php

namespace App\Services\Contact;

use App\Models\ContactSubmission;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function send(array $data): ContactSubmission
    {
        // 1. SAVE TO DATABASE (THIS WAS MISSING)
        $contact = ContactSubmission::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'],
            'status' => 'new',
        ]);

        // 2. SEND EMAIL
        Mail::to('southernplainssportdogclub@gmail.com')
            ->send(new ContactFormMail($data));

        // 3. AUDIT LOG
        app(\App\Services\AuditService::class)->log(
            'form.contact.submitted',
            $contact,
            null,
            $contact->toArray()
        );

        return $contact;
    }
}