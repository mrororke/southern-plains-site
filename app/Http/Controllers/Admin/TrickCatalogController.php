<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trick;
use Illuminate\Http\Request;

class TrickCatalogController extends Controller
{
    public function index() {
        $tricks = Trick::query ()
            ->with(['videos'])
            ->latest()
            ->paginate(25);

            return view('admin.trick-catalog.index', compact('tricks'));
    }
}
