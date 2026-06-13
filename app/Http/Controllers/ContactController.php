<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Services\Contact\ContactService;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Handle submission
     */
    public function store(
        StoreContactRequest $request,
        ContactService $service
    ) {
        $service->send($request->validated());

        return redirect()
            ->route('contact.create')
            ->with('success', 'Thank you! Your message has been sent and we will be in touch shortly.');
    }
}