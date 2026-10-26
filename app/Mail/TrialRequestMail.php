<?php

namespace App\Mail;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrialRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Inquiry $inquiry)
    {
        //
    }

    public function build(): self
    {
        return $this->subject('New NASDA Trial Request')
            ->replyTo($this->inquiry->email, $this->inquiry->name)
            ->view('mail.trial-request');
    }

    public function attachments(): array
    {
        return [];
    }
}