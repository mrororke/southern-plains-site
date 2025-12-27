Southern Plains Mail Setup GuideThis guide covers the implementation for both the standard ContactFormMail and the new HistoryFormMail.1. Mailable ClassesBoth mailables follow the robust build() pattern to ensure compatibility with your SMTP settings.ContactFormMail (app/Mail/ContactFormMail.php)Used for general site inquiries. Uses the contact.mail view.HistoryFormMail (app/Mail/HistoryFormMail.php)Used for the detailed training history form.namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HistoryFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function build(): self
    {
        $subject = "New Training History Form: {$this->data['first_name']} {$this->data['last_name']}";

        return $this->subject($subject)
                    ->replyTo($this->data['email'])
                    ->view('emails.history');
    }
}
2. Controller ImplementationIn your controller methods (e.g., store), use the following logic to trigger the emails:use App\Mail\HistoryFormMail;
use Illuminate\Support\Facades\Mail;

// Inside the store method after validation:
Mail::to('southernplainssportsdogclub@gmail.com')->send(new HistoryFormMail($validatedData));
3. Email Templates (Views)Ensure you have created the following Blade files to render the email content:General Inquiry: resources/views/contact/mail.blade.phpTraining History: resources/views/emails/history.blade.php4. Environment Configuration (.env)On Cloudways, ensure your .env is set up for Gmail SMTP. Remember to use a Google App Password, not your regular Gmail password.MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=southernplainssportsdogclub@gmail.com
MAIL_PASSWORD=your-16-character-app-password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="southernplainssportsdogclub@gmail.com"
MAIL_FROM_NAME="Southern Plains Sport Dog Club"
5. Deployment NoteAfter updating your .env file on the server, always run:php artisan config:clear