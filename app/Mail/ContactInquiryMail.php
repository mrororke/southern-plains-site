<?php

namespace App\Mail;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Inquiry $inquiry)
    {
        //
    }

    public function build(): self
    {
        return $this->subject('New Contact Inquiry')
            ->replyTo($this->inquiry->email, $this->inquiry->name)
            ->view('mail.contact-inquiry');
    }

    public function attachments(): array
    {
        return [];
    }
}