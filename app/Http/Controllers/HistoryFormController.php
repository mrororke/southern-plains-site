<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoryForm\StoreHistoryFormRequest;
use App\Services\HistoryForm\HistoryFormService;

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
     * Handle submission
     */
    public function store(
        StoreHistoryFormRequest $request,
        HistoryFormService $service
    ) {
        $service->submit($request->validated());

        return redirect()
            ->route('emails.history.create')
            ->with('success', 'Thank you! Your training history has been submitted successfully.');
    }
}