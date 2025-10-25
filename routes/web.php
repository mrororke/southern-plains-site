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
    return view('welcome');
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

// In the route group at the bottom of the file
Route::middleware(['auth', 'admin'])
     ->name('admin.') // 💡 TEMPORARILY ADD THIS TO FORCE RECOGNITION
     ->group(function () {
    
    // The previous name of the route was implicitly 'admin.posts.store'
    // Now the name is explicitly defined.
    Route::resource('admin/posts', PostController::class); 
});

require __DIR__.'/auth.php';
