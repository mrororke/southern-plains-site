<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The data array containing all validated form inputs.
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
        $subject = "New Inquiry: {$this->data['inquiry_type']} ({$this->data['first_name']} {$this->data['last_name']})";

        // Returns the message using the subject, reply-to, and the Blade view.
        return $this->subject($subject)
                    // Allows you to hit "Reply" in your inbox to email the user back.
                    ->replyTo($this->data['email'])
                    // Renders the HTML content using the view: resources/views/contact/mail.blade.php.
                    ->view('contact.mail');
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