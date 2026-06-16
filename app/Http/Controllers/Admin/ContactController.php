<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
{
    $contacts = ContactSubmission::latest()->paginate(20);

    return view('admin.contacts.index', compact('contacts'));
}

public function show(ContactSubmission $contact)
{
    return view('admin.contacts.show', compact('contact'));
}
}