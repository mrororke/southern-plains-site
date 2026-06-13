<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrickEvaluation\StoreTrickEvaluationRequest;
use App\Services\TrickEvaluation\TrickEvaluationService;

class TrickEvaluationController extends Controller
{
    public function create()
    {
        return view('emails.trick.create');
    }

    public function store(
        StoreTrickEvaluationRequest $request,
        TrickEvaluationService $service
    ) {
        $service->submit($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Thank you! Your evaluation request has been submitted successfully.');
    }
}