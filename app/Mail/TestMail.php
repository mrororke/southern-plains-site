<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * This method is used instead of the modern envelope/content approach
     * to prevent the "View not found" error caused by environment inconsistencies.
     */
    public function build(): self
    {
        return $this->subject('SMTP Configuration Test')
                    // This uses the HTML property directly, bypassing the View lookup.
                    ->html('<h1>Test Email from Southern Plains Club!</h1><p>If you see this, your SMTP configuration works.</p>');
    }
}