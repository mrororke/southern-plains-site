<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HistoryFormMail;

class HistoryFormController extends Controller
{
    /**
     * Show the training history form.
     */
    public function create()
    {
        return view('emails.history.create');
    }

    /**
     * Handle the submission of the training history form.
     */
    public function store(Request $request)
    {
        // 1. Validation matching the required fields for the history form
        $validated = $request->validate([
            // Owner Information
            'first_name'        => 'required|string|max:100',
            'last_name'         => 'required|string|max:100',
            'email'             => 'required|email|max:100', // Uses 'email' filter for better validation
            'phone'             => 'required|string|max:20',  // Reduced max size for phone numbers
            'preferred_contact' => 'required|string|in:email,phone,text',
            'area'         => 'required|string|max:100',
            'referred'         => 'mullable|string|max:100',
            'dog_name'         => 'required|string|max:100',
            'dog_breed'         => 'required|string|max:100',
            'dog_age'         => 'required|string|max:100',
            'gender' => 'required|string|in:male,neutered,female,spayed',
            'how_can_i_help' => 'required|string|min:10|max:1000',

        ]);

        try {
            // 2. Send the email using Laravel's Mail facade
            Mail::to('southernplainssportdogclub@gmail.com')->send(new HistoryFormMail($validated));

            // 3. Redirect back with a success message
            return redirect()->route('emails.history.create')->with('success', 'Thank you! Your training history has been submitted successfully.');
        } catch (\Exception $e) {
            // Log the error and redirect back with failure
            \Log::error("History form submission failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue submitting your history. Please try again or email us directly.')->withInput();
        }
    }
}
