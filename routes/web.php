<?php

use Illuminate\Support\Facades\Route;

use App\Navigation\AdminNavigation;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryFormController;
use App\Http\Controllers\TrickEvaluationController;
use App\Http\Controllers\TrickController;
use App\Http\Controllers\Admin\TrickCatalogController;

use App\Http\Controllers\Admin\BackendSearchController;
use App\Http\Controllers\Admin\ResourceLibrary\ResourceController;
use App\Http\Controllers\Admin\LearnController;

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
| PUBLIC WEBSITE V2 SANDBOX
|--------------------------------------------------------------------------
*/

Route::prefix('v2')
    ->name('public-v2.')
    ->group(function () {

        Route::view('/', 'public-v2.pages.home')
            ->name('home');

        Route::view('/about', 'public-v2.pages.about')
            ->name('about');

        Route::view('/training', 'public-v2.pages.training')
            ->name('training');

        Route::view('/dog-sports', 'public-v2.pages.dog-sports')
            ->name('dog-sports');

        Route::view('/learn', 'public-v2.learn.index')
            ->name('learn.index');

        Route::view('/learn/what-is-nasda', 'public-v2.learn.guide')
            ->name('learn.guide');

        Route::view('/learn/the-legacy-of-luka', 'public-v2.learn.article')
            ->name('learn.article');

        Route::view('/learn/book-review/one-on-one', 'public-v2.learn.book-review')
            ->name('learn.book-review');

        Route::view('/events', 'public-v2.events.index')
            ->name('events.index');

        Route::view('/contact', 'public-v2.pages.contact')
            ->name('contact');
    });



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
| ADMIN AREA (ADMIN + INSTRUCTOR ACCESS)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin-legacy')
    ->name('admin-legacy.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', function (AdminDashboardService $service) {
            return view('admin-legacy.dashboard', $service->data());
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
        | TRICK EVALUATIONS
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
        | CONTACTS
        |--------------------------------------------------------------------------
        */
        Route::get('/contacts', [AdminContactController::class, 'index'])
            ->name('contacts.index');

        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])
            ->name('contacts.show');

        Route::patch('/contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])
            ->name('contacts.status');

        /*
|--------------------------------------------------------------------------
| TRICK CATALOG (ADMIN + INSTRUCTOR)
|--------------------------------------------------------------------------
*/

        Route::get(
            'trick-catalog/print',
            [TrickCatalogController::class, 'printAll']
        )->name('trick-catalog.print-all');

        Route::post(
            'trick-catalog/check-video',
            [TrickCatalogController::class, 'checkVideo']
        )->name('trick-catalog.check-video');

        Route::get('trick-catalog/video-row', function () {
            return view('admin.trick-catalog.partials.video-row', [
                'index' => request('index')
            ]);
        })->name('trick-catalog.video-row');

        Route::get(
            'trick-catalog/{trick_catalog}/show-data',
            [TrickCatalogController::class, 'showData']
        )->name('trick-catalog.show-data');

        Route::resource('trick-catalog', TrickCatalogController::class)
            ->except(['show']);
    });   // <-- closes the admin route group


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD V2 SANDBOX
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'device'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {
            $isMobile = request()->attributes->get('isMobile', false);

            $recentBehaviors = \App\Models\Trick::query()
                ->with(['levels', 'creator', 'updater'])
                ->latest('updated_at')
                ->limit(5)
                ->get();

            return view(
                $isMobile
                    ? 'admin.dashboard-v2.mobile.dashboard'
                    : 'admin.dashboard-v2.dashboard',
                [
                    'navigation' => \App\Navigation\AdminNavigation::items(),
                    'recentBehaviors' => $recentBehaviors,
                ]
            );
        })->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Global Search
        |--------------------------------------------------------------------------
        */

        Route::get(
            'search',
            [BackendSearchController::class, 'index']
        )->name('search');

        /*
        |--------------------------------------------------------------------------
        | Behavior Catalog
        |--------------------------------------------------------------------------
        */

        Route::get(
            'behavior-catalog',
            [TrickCatalogController::class, 'behaviorCatalog']
        )->name('behavior-catalog.index');

        Route::get(
            'behavior-catalog/print',
            [TrickCatalogController::class, 'printAll']
        )->name('behavior-catalog.print-all');

        Route::get(
            'behavior-catalog/create',
            [TrickCatalogController::class, 'behaviorCreate']
        )->name('behavior-catalog.create');

        Route::post(
            'behavior-catalog',
            [TrickCatalogController::class, 'behaviorStore']
        )->name('behavior-catalog.store');

        Route::get(
            'behavior-catalog/video-row',
            function () {
                return view(
                    'admin.dashboard-v2.behavior-catalog.partials.video-row',
                    [
                        'index' => request('index'),
                    ]
                );
            }
        )->name('behavior-catalog.video-row');

        Route::post(
            'behavior-catalog/check-video',
            [TrickCatalogController::class, 'checkVideo']
        )->name('behavior-catalog.check-video');

        Route::get(
            'behavior-catalog/{trick}/edit',
            [TrickCatalogController::class, 'behaviorEdit']
        )->name('behavior-catalog.edit');

        Route::put(
            'behavior-catalog/{trick}',
            [TrickCatalogController::class, 'behaviorUpdate']
        )->name('behavior-catalog.update');

        Route::delete(
            'behavior-catalog/{trick}',
            [TrickCatalogController::class, 'behaviorDestroy']
        )->name('behavior-catalog.destroy');

        Route::get(
            'behavior-catalog/{trick}',
            [TrickCatalogController::class, 'behaviorShow']
        )->name('behavior-catalog.show');

        /*
|--------------------------------------------------------------------------
| Resource Library
|--------------------------------------------------------------------------
*/

        Route::get(
            'resource-library',
            [ResourceController::class, 'index']
        )->name('resource-library.index');

        Route::get(
            'resource-library/create',
            [ResourceController::class, 'create']
        )->name('resource-library.create');

        Route::post(
            'resource-library',
            [ResourceController::class, 'store']
        )->name('resource-library.store');

        Route::get(
            'resource-library/{resource}/edit',
            [ResourceController::class, 'edit']
        )->name('resource-library.edit');

        Route::put(
            'resource-library/{resource}',
            [ResourceController::class, 'update']
        )->name('resource-library.update');

        Route::delete(
            'resource-library/{resource}',
            [ResourceController::class, 'destroy']
        )->name('resource-library.destroy');

        Route::get(
            'resource-library/{resource}',
            [ResourceController::class, 'show']
        )->name('resource-library.show');


            /*
        |--------------------------------------------------------------------------
        | Learn
        |--------------------------------------------------------------------------
        */

        Route::get('/learn', [LearnController::class, 'index'])
            ->name('learn.index');

        Route::get('/learn/create', [LearnController::class, 'create'])
            ->name('learn.create');

        Route::post('/learn', [LearnController::class, 'store'])
            ->name('learn.store');

        Route::get('/learn/{article}/edit', [LearnController::class, 'edit'])
            ->name('learn.edit');

        Route::put('/learn/{article}', [LearnController::class, 'update'])
            ->name('learn.update');

    
    });


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
