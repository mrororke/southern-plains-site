<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryFormController;
use App\Http\Controllers\TrickEvaluationController;
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

// Form Related Routes
Route::get('/history/create', [HistoryFormController::class, 'create'])->name('emails.history.create');
Route::post('/history/store', [HistoryFormController::class, 'store'])->name('emails.history.store');
Route::get('/trickevaluation/create', [TrickEvaluationController::class, 'create'])->name('emails.trickevaluation.create');
Route::post('/trickevaluation/store', [TrickEvaluationController::class, 'store'])->name('emails.trickevaluation.store');



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
    
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard'); 
    
    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin.index');

    // This is the most complex one. Your current setup should work, but let's be explicit.
    Route::resource('admin/posts', PostController::class)->names('admin.posts');
});

// Legal Routes
Route::prefix('legal')->name('legal.')->group(function () {
    Route::get('/tos', function () { return view('legal.tos'); })->name('tos');
    Route::get('/privacy', function () { return view('legal.privacy'); })->name('privacy');
    Route::get('/cookies', function () { return view('legal.cookies'); })->name('cookies');
    Route::get('/refund', function () { return view('legal.refund'); })->name('refund');
    Route::get('/waiver', function () { return view('legal.waiver'); })->name('waiver');
    Route::get('/conduct', function () { return view('legal.conduct'); })->name('conduct');
});


require __DIR__ . '/auth.php';
