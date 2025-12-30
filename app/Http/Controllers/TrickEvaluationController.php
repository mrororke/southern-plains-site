<?php

namespace App\Http\Controllers;

use App\Mail\TrickEvaluationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TrickEvaluationController extends Controller
{
    /**
     * Show the form for creating a new trick evaluation request.
     */
    public function create()
    {
        return view('emails.trickevaluations.create');
    }

    /**
     * Handle the submission of the trick evaluation form.
     */
    public function store(Request $request)
    {
        // 1. Validation matching your Blade input names exactly
        $validated = $request->validate([
            // Owner Info
            'owner_name'         => 'required|string|max:255',
            'email'              => 'required|email:rfc,dns|max:255',

            // Primary Dog Info
            'dog_name'           => 'required|string|max:100',
            'dog_number'         => 'required|string|max:50', // Added this
            'trick_level'        => 'required|in:Novice,Intermediate,Advanced,Performer,Elite Performer',

            // Evaluation Method Logic
            'eval_method'        => 'required|in:online,in-person',
            
            // Required if method is 'online'
            'video_link'         => 'required_if:eval_method,online|nullable|url|max:255',
            
            // Required if method is 'in-person'
            'scheduled_datetime' => 'required_if:eval_method,in-person|nullable|date',

            // Multi-dog Logic (Arrays)
            'additional_dogs'           => 'nullable|integer|min:0|max:10',
            'additional_dog_names'      => 'nullable|array',
            'additional_dog_names.*'    => 'required_with:additional_dog_names|string|max:100',
            
            'additional_dog_numbers'    => 'nullable|array', // Added this
            'additional_dog_numbers.*'  => 'required_with:additional_dog_names|string|max:50', // Added this
            
            'additional_dog_levels'     => 'nullable|array',
            'additional_dog_levels.*'   => 'required_with:additional_dog_names|in:Novice,Intermediate,Advanced,Performer,Elite Performer',
            'additional_dog_video'      => 'nullable|array',
            'additional_dog_video.*'    => 'nullable|url|max:255',

            // Payment & Totals
            'payment_method'     => 'required|in:Apple Pay,Venmo,PayPal',
            'total_fee'          => 'required|numeric',
        ]);

        try {
            // 2. Send the email to the club
            Mail::to('southernplainssportdogclub@gmail.com')->send(new TrickEvaluationMail($validated));

            // 3. Success Redirect
            return redirect()->back()
                ->with('success', 'Thank you! Your evaluation request for ' . $request->dog_name . ' has been submitted successfully.');

        } catch (\Exception $e) {
            // Log the actual error for debugging
            Log::error("Trick evaluation submission error: " . $e->getMessage());

            return redirect()->back()
                ->with('error', 'There was an issue submitting your request. Please check your details and try again.')
                ->withInput();
        }
    }
}