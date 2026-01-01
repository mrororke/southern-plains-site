<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function create()
    {
        // Simply returns the contact form view
        return view('contact.create');
    }

    /**
     * Handle the submission of the contact form.
     */
    public function store(Request $request)
    {
        // 1. Validation based on our required fields
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns',
            'contact_phone' => 'nullable|string|max:20',
            'inquiry_type' => 'required|string',
            'is_member' => 'nullable|string', // Handled by radio buttons
            'message' => 'required|string|min:10',
        ]);

        try {
            // 2. Send the email using Laravel's Mail facade
            // IMPORTANT: Replace 'your@email.com' with the club's actual receiving email address
            Mail::to('southernplainssportdogclub@gmail.com')->send(new ContactFormMail($validated));

            // 3. Redirect back with a success message
            return redirect()->route('contact.create')->with('success', 'Thank you! Your message has been sent and we will be in touch shortly.');

        } catch (\Exception $e) {
            // Log the error and redirect back with failure
            \Log::error("Contact form submission failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue sending your message. Please try again or email us directly.')->withInput();
        }
    }
}
