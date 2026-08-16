<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BackendSearchService;
use Illuminate\Http\Request;

class BackendSearchController extends Controller
{
    public function index(
        Request $request,
        BackendSearchService $searchService
    ) {
        $results = $searchService->search(
            $request->input('search', '')
        );

        return response()->json($results);
    }
}