<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $contacts = ContactSubmission::latest()->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */
    public function show(ContactSubmission $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS (THIS WAS MISSING)
    |--------------------------------------------------------------------------
    */
    public function updateStatus(Request $request, ContactSubmission $contact)
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

        return back()->with('success', 'Status updated.');
    }
}