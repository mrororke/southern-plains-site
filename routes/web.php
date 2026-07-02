<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryFormController;
use App\Http\Controllers\TrickEvaluationController;
use App\Http\Controllers\TrickController;
use App\Http\Controllers\Admin\TrickCatalogController;

use App\Http\Controllers\Admin\TrickEvaluationController as AdminTrickEvaluationController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use App\Http\Controllers\RatController;
use App\Services\AdminDashboardService;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');

Route::view('/training', 'training.index')->name('training.index');

Route::get('/league', fn() => view('league.index'))->name('league.index');

/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('category/{category:slug}', [BlogController::class, 'category'])->name('category');
    Route::get('tag/{tag:slug}', [BlogController::class, 'tag'])->name('tag');
    Route::get('{post:slug}', [BlogController::class, 'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| EVENTS
|--------------------------------------------------------------------------
*/

Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('{event:slug}', [EventController::class, 'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| CONTACT (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'create'])->name('create');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});

/*
|--------------------------------------------------------------------------
| FORMS
|--------------------------------------------------------------------------
*/

Route::prefix('forms')->name('forms.')->group(function () {
    Route::get('/history', [HistoryFormController::class, 'create'])->name('history.create');
    Route::post('/history', [HistoryFormController::class, 'store'])->name('history.store');

    Route::get('/trick-evaluation', [TrickEvaluationController::class, 'create'])->name('trick.create');
    Route::post('/trick-evaluation', [TrickEvaluationController::class, 'store'])->name('trick.store');
});

/*
|--------------------------------------------------------------------------
| LEGAL
|--------------------------------------------------------------------------
*/

Route::prefix('legal')->name('legal.')->group(function () {
    Route::view('/tos', 'legal.tos')->name('tos');
    Route::view('/privacy', 'legal.privacy')->name('privacy');
    Route::view('/cookies', 'legal.cookies')->name('cookies');
    Route::view('/refund', 'legal.refund')->name('refund');
    Route::view('/waiver', 'legal.waiver')->name('waiver');
    Route::view('/conduct', 'legal.conduct')->name('conduct');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

/*
|--------------------------------------------------------------------------
| INSTRUCTOR AREA 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:instructor'])
    ->prefix('instructor')
    ->name('instructor.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return redirect()->route('admin.trick-catalog.index');
        })->name('dashboard');

    });


/*
|--------------------------------------------------------------------------
| ADMIN AREA (ADMIN ONLY)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', function (AdminDashboardService $service) {
            return view('admin.dashboard', $service->data());
        })->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Content
        |--------------------------------------------------------------------------
        */
        Route::resource('posts', PostController::class);
        Route::resource('rats', RatController::class);

        Route::get('rats/{rat}/pedigree', [RatController::class, 'show'])
            ->name('rats.pedigree');

        /*
        |--------------------------------------------------------------------------
        | Trick Evaluations
        |--------------------------------------------------------------------------
        */
        Route::get('/tricks', [AdminTrickEvaluationController::class, 'index'])
            ->name('tricks.index');

        Route::get('/tricks/{trickEvaluation}', [AdminTrickEvaluationController::class, 'show'])
            ->name('tricks.show');

        Route::patch('/tricks/{trickEvaluation}/status', [AdminTrickEvaluationController::class, 'updateStatus'])
            ->name('tricks.status');

        Route::post('/tricks/{trickEvaluation}/notes', [TrickEvaluationController::class, 'storeNote'])
            ->name('tricks.notes.store');

        /*
        |--------------------------------------------------------------------------
        | Contacts
        |--------------------------------------------------------------------------
        */
        Route::get('/contacts', [AdminContactController::class, 'index'])
            ->name('contacts.index');

        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])
            ->name('contacts.show');

        Route::patch('/contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])
            ->name('contacts.status');
    });

/*
|--------------------------------------------------------------------------
| TRICK CATALOG (ADMIN + INSTRUCTOR)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:instructor'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('trick-catalog', App\Http\Controllers\Admin\TrickCatalogController::class)
            ->except(['show']);

        Route::post(
            'trick-catalog/check-video',
            [App\Http\Controllers\Admin\TrickCatalogController::class, 'checkVideo']
        )->name('trick-catalog.check-video');

        Route::get(
            'trick-catalog/{trick_catalog}/show-data',
            [App\Http\Controllers\Admin\TrickCatalogController::class, 'showData']
        )->name('trick-catalog.show-data');

        Route::get('trick-catalog/video-row', function () {
            return view('admin.trick-catalog.partials.video-row', [
                'index' => request('index')
            ]);
        });

    });

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';