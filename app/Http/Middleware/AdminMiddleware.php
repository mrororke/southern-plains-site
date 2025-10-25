<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in AND is an admin
    if (Auth::check() && Auth::user()->isAdmin()) { // Uses Auth::check() and isAdmin()
        return $next($request);
    }

        // If not admin, redirect them to the home page
        return redirect('/');
    }
}
