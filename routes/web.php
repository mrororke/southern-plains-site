<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryFormController;
use App\Http\Controllers\TrickEvaluationController;
use App\Http\Controllers\Admin\TrickEvaluationController as AdminTrickEvaluationController;
use App\Http\Controllers\RatController;
use App\Services\AuditService;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', fn() => view('home'))->name('home');

// About
Route::get('/about', fn() => view('about'))->name('about');

// Training Page
Route::view('/training', 'training.index')
    ->name('training.index');

// League Page
Route::get('/league', function () {
    return view('league.index'); // Using the appropriate view name
})->name('league.index');


/*
|--------------------------------------------------------------------------
| BLOG (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('category/{category:slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/tag/{tag:slug}', [BlogController::class, 'tag'])->name('tag');
    Route::get('/{post:slug}', [BlogController::class, 'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| EVENTS (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/{event:slug}', [EventController::class, 'show'])->name('show');
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
| FORMS (PUBLIC)
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
| LEGAL (PUBLIC)
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
| AUTHENTICATED BASE ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA (RBAC PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/layout-test', function (AuditService $auditService) {
            return view('admin.layout-test', [
                'recentActivity' => $auditService->recent(5),
            ]);
        })->name('layout-test');

        Route::resource('posts', PostController::class);
        Route::resource('rats', RatController::class);

        Route::get('rats/{rat}/pedigree', [RatController::class, 'show'])
            ->name('rats.pedigree');

        // Tricks Submissions
        Route::get('/tricks', [
    AdminTrickEvaluationController::class,
    'index'
])->name('tricks.index');

Route::get('/tricks/{trickEvaluation}', [
    AdminTrickEvaluationController::class,
    'show'
])->name('tricks.show');

Route::patch('/tricks/{trickEvaluation}/status', [
    AdminTrickEvaluationController::class,
    'updateStatus'
])->name('tricks.status');


/*
|--------------------------------------------------------------------------
| FUTURE PORTALS (PLACEHOLDERS)
|--------------------------------------------------------------------------
|
| These will be activated later:
|
| Route::middleware(['auth', 'role:client'])
|     ->prefix('client')
|     ->group(function () {});
|
| Route::middleware(['auth', 'role:staff'])
|     ->prefix('staff')
|     ->group(function () {});
|
*/


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
