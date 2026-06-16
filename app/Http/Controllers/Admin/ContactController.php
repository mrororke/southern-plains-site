<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|string',
        ]);

        $old = $contact->only(['status']);

        $contact->update([
            'status' => $validated['status'],
        ]);

        app(\App\Services\AuditService::class)->log(
            'contact.status_updated',
            $contact,
            $old,
            ['status' => $validated['status']]
        );

        return back();
    }
}