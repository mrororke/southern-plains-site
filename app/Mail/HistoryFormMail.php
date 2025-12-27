<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HistoryFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The data array containing all validated form inputs from the history form.
     */
    public function __construct(public array $data)
    {
        //
    }

    /**
     * Build the message.
     * This uses the robust build() method to ensure compatibility with your verified SMTP setup.
     */
    public function build(): self
    {
        $subject = "New Training History Form: {$this->data['first_name']} {$this->data['last_name']}";

        // Returns the message using the subject, reply-to, and the specific history mail view.
        return $this->subject($subject)
            // Allows you to hit "Reply" in your inbox to email the user back directly.
            ->replyTo($this->data['email'])
            // Renders the HTML content using the view: resources/views/emails/history.blade.php.
            ->view('emails.history.create');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
