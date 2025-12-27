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
        return view('history.create');
    }

    /**
     * Handle the submission of the training history form.
     */
    public function store(Request $request)
    {
        // 1. Validation matching the required fields for the history form
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns',
            'dog_name' => 'required|string|max:255',
            'dog_breed' => 'nullable|string|max:255',
            'dog_age' => 'nullable|string|max:100',
            'training_goals' => 'required|string|min:20',
            'previous_training' => 'nullable|string',
            'health_notes' => 'nullable|string',
        ]);

        try {
            // 2. Send the email using Laravel's Mail facade
            Mail::to('southernplainssportdogclub@gmail.com')->send(new HistoryFormMail($validated));

            // 3. Redirect back with a success message
            return redirect()->route('history.create')->with('success', 'Thank you! Your training history has been submitted successfully.');

        } catch (\Exception $e) {
            // Log the error and redirect back with failure
            \Log::error("History form submission failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue submitting your history. Please try again or email us directly.')->withInput();
        }
    }
}