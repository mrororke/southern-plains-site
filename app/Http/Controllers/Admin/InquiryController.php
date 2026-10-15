<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InquiryController extends Controller
{
    /**
     * Display an individual inquiry.
     */
    public function show(Inquiry $inquiry): View
    {
        if (is_null($inquiry->read_at)) {
            $inquiry->update([
                'read_at' => now(),
            ]);
        }

        return view('admin.dashboard-v2.inquiries.show', [
            'inquiry' => $inquiry,
            'navigation' => \App\Navigation\AdminNavigation::items(),
        ]);
    }

    /**
     * Mark an inquiry as resolved.
     */
    public function resolve(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->update([
            'resolved_at' => now(),
        ]);

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry marked as resolved.');
    }

    /**
     * Reopen a resolved inquiry.
     */
    public function reopen(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->update([
            'resolved_at' => null,
        ]);

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry reopened.');
    }
}