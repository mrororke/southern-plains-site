<?php

namespace App\Mail;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkshopRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Inquiry $inquiry)
    {
        //
    }

    public function build(): self
    {
        return $this->subject('New Intro to NASDA Workshop Request')
                    ->replyTo($this->inquiry->email, $this->inquiry->name)
                    ->view('mail.workshop-request');
    }

    public function attachments(): array
    {
        return [];
    }
}