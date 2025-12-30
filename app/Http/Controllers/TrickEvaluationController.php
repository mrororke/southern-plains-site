<?php

namespace App\Http\Controllers;

use App\Mail\TrickEvaluationMail;
use Illuminate\Http\Request;

class TrickEvaluationController extends Controller
{
    public function create()
    {
        return view('emails.trickevaluations.create');
    }

     /**
     * Handle the submission of the training history form.
     */
    public function store(Request $request)
    {
        // 1. Validation matching the required fields for the history form
        $validated = $request->validate([
            // Trick Level Selection
    'trick_level'      => 'required|in:Novice,Intermediate,Advanced,Performer,Elite Performer',

    // Owner Information
    'owner_name'       => 'required|string|max:255',
    'owner_email'      => 'required|email:rfc,dns|max:255',

    // Dog Information
    'dog_name'         => 'required|string|max:100',
    'dog_number'       => 'nullable|string|max:50',

    // Submission Logic
    // Required if in-person dates are missing
    'video_playlist'   => 'required_without:in_person_schedule|nullable|url|max:255',

    // Required if video link is missing
    'in_person_schedule' => 'required_without:video_playlist|nullable|string|min:20|max:1000',

        ]);

        try {
            // 2. Send the email using Laravel's Mail facade
            Mail::to('southernplainssportdogclub@gmail.com')->send(new TrickEvaluation($validated));

            // 3. Redirect back with a success message
            return redirect()->route('emails.trickevaluation.create')->with('success', 'Thank you! Your trick evaluation request has been submitted successfully.');
        } catch (\Exception $e) {
            // Log the error and redirect back with failure
            \Log::error("Trick evaluation form submission failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue submitting your evaluation request. Please try again or email us directly.')->withInput();
        }
    }
}
