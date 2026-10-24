<?php

namespace App\Http\Controllers;

use App\Mail\ContactInquiryMail;
use App\Mail\WorkshopRequestMail;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function workshop(): View
    {
        return view('public-v2.inquiries.workshop');
    }

    public function contact(): View
    {
        return view('public-v2.inquiries.contact');
    }

    public function storeWorkshop(Request $request): RedirectResponse
    {
        // Honeypot: silently reject submissions that fill the hidden field.
        if ($request->filled('website_url')) {
            return redirect()
                ->back()
                ->with('success', [
                    'title' => 'Your request is on its way!',
                    'message' => "Thanks for reaching out! I'll review your workshop request and get back to you by email.\nIn the meantime, feel free to explore the rest of the site and learn more about NASDA.",
                ]);
        }

        // Limit submissions to 3 per IP address every 15 minutes.
        $rateLimitKey = 'workshop-request:' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {
            return redirect()
                ->back()
                ->withErrors([
                    'rate_limit' => 'Too many requests have been submitted. Please wait 15 minutes before trying again.',
                ])
                ->withInput($request->except('website_url'));
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'participants' => ['required', 'integer', 'min:1'],
            'preferred_timeframe' => ['nullable', 'string', 'max:255'],
            'nasda_experience' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        // Save the workshop request.
        $inquiry = Inquiry::create([
            'type' => 'workshop_request',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => 'Intro to NASDA Workshop Request',
            'message' => $validated['message'],
            'details' => [
                'organization' => $validated['organization'] ?? null,
                'city' => $validated['city'],
                'state' => $validated['state'],
                'participants' => $validated['participants'],
                'preferred_timeframe' => $validated['preferred_timeframe'] ?? null,
                'nasda_experience' => $validated['nasda_experience'] ?? null,
            ],
        ]);

        // Count successful submissions toward the rate limit.
        RateLimiter::hit($rateLimitKey, 900);

        // Email the club when a new workshop request arrives.
        Mail::to(config('mail.from.address'))
            ->send(new WorkshopRequestMail($inquiry));

        return redirect()
            ->back()
            ->with('success', [
                'title' => 'Your request is on its way!',
                'message' => "Thanks for reaching out! I'll review your workshop request and get back to you by email.\nIn the meantime, feel free to explore the rest of the site and learn more about NASDA.",
            ]);
    }

    public function storeContact(Request $request): RedirectResponse
    {
        // Honeypot: silently reject submissions that fill the hidden field.
        if ($request->filled('website_url')) {
            return redirect()
                ->back()
                ->with('success', [
                    'title' => 'Your message is on its way!',
                    'message' => "Thanks for reaching out! I'll review your message and get back to you by email.",
                ]);
        }

        // Limit submissions to 3 per IP address every 15 minutes.
        $rateLimitKey = 'contact-inquiry:' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {
            return redirect()
                ->back()
                ->withErrors([
                    'rate_limit' => 'Too many messages have been submitted. Please wait 15 minutes before trying again.',
                ])
                ->withInput($request->except('website_url'));
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'inquiry' => ['required', 'string', 'in:general,training,sports,events,other'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        // Save the contact inquiry.
        $inquiry = Inquiry::create([
            'type' => 'contact',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => 'Contact Inquiry',
            'message' => $validated['message'],
            'details' => [
                'inquiry' => $validated['inquiry'],
            ],
        ]);

        // Count successful submissions toward the rate limit.
        RateLimiter::hit($rateLimitKey, 900);

        // Email the club when a new contact inquiry arrives.
        Mail::to(config('mail.from.address'))
            ->send(new ContactInquiryMail($inquiry));

        return redirect()
            ->back()
            ->with('success', [
                'title' => 'Your message is on its way!',
                'message' => "Thanks for reaching out! I'll review your message and get back to you by email.",
            ]);
    }
}