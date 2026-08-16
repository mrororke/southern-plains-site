<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminDashboardService;
use App\Services\InboxService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __invoke(InboxService $inbox)
{
    return view('admin.dashboard', [
        'inbox' => $inbox->all(),
    ]);
}
}
