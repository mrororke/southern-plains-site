<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrickEvaluation;
use Illuminate\Http\Request;

class TrickEvaluationController extends Controller
{
    public function index()
    {
        $evaluations = TrickEvaluation::latest()->paginate(20);

        return view('admin.tricks.index', compact('evaluations'));
    }

    public function show(TrickEvaluation $trickEvaluation)
    {

        return view('admin.submissions.show', [
            'title' => 'Trick Evaluation — ' . $trickEvaluation->dog_name,

            'created_at' => $trickEvaluation->created_at->format('M d, H:i'),

            'summary' => "{$trickEvaluation->owner_name} submitted a {$trickEvaluation->trick_level} evaluation",

            'fields' => [
                'Owner' => $trickEvaluation->owner_name,
                'Email' => $trickEvaluation->email,
                'Dog' => $trickEvaluation->dog_name,
                'Level' => $trickEvaluation->trick_level,
                'Method' => $trickEvaluation->eval_method,
                'Video' => $trickEvaluation->video_link,
                'Scheduled' => $trickEvaluation->scheduled_datetime,
                'Payment Method' => $trickEvaluation->payment_method,
                'Total Fee' => $trickEvaluation->total_fee,
            ],

            'diff' => [],
        ]);
    }
}
