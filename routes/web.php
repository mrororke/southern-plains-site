<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
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

// Home Page
Route::get('/', function () {
    // This assumes you have renamed your original 'welcome.blade.php' to 'home.blade.php'
    return view('home');
})->name('welcome'); // Named 'welcome' for the link, or you can use 'home'

// About Page
Route::get('/about', function () {
    return view('about');
})->name('about');

// PUBLIC BLOG ROUTES
// Blog Index
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// Filter by Category
Route::get('/blog/category/{category:slug}', [BlogController::class, 'category'])->name('blog.category');

// Filter by Tag
Route::get('/blog/tag/{tag:slug}', [BlogController::class, 'tag'])->name('blog.tag');

// Single Post View (Using Post:slug for route model binding)
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Training Page
Route::view('/training', 'training.index')
    ->name('training.index');

// League Page
Route::get('/league', function () {
    return view('league.index'); // Using the appropriate view name
})->name('league.index');

// Calendar Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event:slug}', [EventController::class, 'show'])->name('events.show');

// Contact Page
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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

// --- ADD THIS TEMPORARILY FOR TESTING ---
Route::get('/test-error/{code}', function ($code) {
    // This function tells Laravel to render the specified error view (e.g., resources/views/errors/500.blade.php)
    // without actually raising the corresponding HTTP status.
    abort($code); 
})->where('code', '[0-9]+'); // Ensures the code is a number

// Example usage in browser:
// http://yourdomain.test/test-error/500 
// http://yourdomain.test/test-error/419
// http://yourdomain.test/test-error/503
// ----------------------------------------

require __DIR__ . '/auth.php';
