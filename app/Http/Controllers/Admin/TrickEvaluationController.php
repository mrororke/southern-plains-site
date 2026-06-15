<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrickEvaluation;
use Illuminate\Http\Request;

class TrickEvaluationController extends Controller
{
    public function show(TrickEvaluation $trickEvaluation)
    {
        return view('admin.tricks.show', compact('trickEvaluation'));
    }
}
