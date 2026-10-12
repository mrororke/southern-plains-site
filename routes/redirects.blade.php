<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Legacy URL Redirects
|--------------------------------------------------------------------------
|
| Permanent redirects from the original Southern Plains Sport Dog Club
| website to the redesigned V2 website.
|
| Use relative paths so redirects work on the production domain.
| Keep these redirects in place after launch.
|
| Add new redirects as content is migrated.
|
*/

/*
|--------------------------------------------------------------------------
| Blog → Learn
|--------------------------------------------------------------------------
*/

Route::redirect(
    '/blog/from-dream-dog-to-real-dog-the-journey-that-inspired-this-club',
    '/learn/from-dream-dog-to-real-dog-the-journey-that-inspired-this-club',
    301
);



//  Moose - Training Journey Article
// https://phplaravel-1532609-5910943.cloudwaysapps.com/v2/learn/moose-the-weimaraner-who-sparked-my-training-journey
// https://southernplains.dog/blog/moose-the-weimaraner-who-sparked-my-training-journey

// One on One Book Review
// https://southernplains.dog/blog/book-review-a-practical-guide-to-private-lessons-by-nicole-wilde
// https://phplaravel-1532609-5910943.cloudwaysapps.com/v2/learn/one-on-one-a-dog-trainers-guide-to-private-lessons