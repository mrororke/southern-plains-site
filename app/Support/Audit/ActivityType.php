<?php

namespace App\Support\Audit;

class ActivityType
{
    // Trick Evaluations
    public const TRICK_SUBMITTED = 'trick_evaluation.submitted';
    public const TRICK_STATUS_CHANGED = 'trick_evaluation.status_changed';
    public const TRICK_NOTE_ADDED = 'trick_evaluation.note_added';

    // Contact / Forms
    public const CONTACT_SUBMITTED = 'contact.submitted';
    public const HISTORY_SUBMITTED = 'history.submitted';

    // Future examples
    public const CLIENT_MESSAGE = 'client.message.sent';
    public const INVOICE_PAID = 'invoice.paid';
}