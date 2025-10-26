<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('welcome');
});

Route::get('/training', function () {
    return view('welcome');
});

Route::get('/league', function () {
    return view('welcome');
});

Route::get('/events', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// In Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    
    // FIX 1: Correct the Dashboard name
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard'); 
    
    // FIX 2: Correct the base /admin route (if you added it)
    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin.index');

    // FIX 3: Correct the Post Management name 
    // This is the most complex one. Your current setup should work, but let's be explicit.
    Route::resource('admin/posts', PostController::class)->names('admin.posts');
});

require __DIR__ . '/auth.php';
