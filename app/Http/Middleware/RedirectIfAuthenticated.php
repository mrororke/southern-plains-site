<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$guards
    ): Response {
        $guards = empty($guards)
            ? [null]
            : $guards;

        foreach ($guards as $guard) {

            if (! Auth::guard($guard)->check()) {
                continue;
            }

            $user = Auth::user();

            /*
            |--------------------------------------------------------------------------
            | Backend Users
            |--------------------------------------------------------------------------
            |
            | Admins and instructors now share the same backend.
            | Role-based navigation determines what each user can access.
            |
            */

            if (
                $user
                && (
                    $user->isAdmin()
                    || $user->roles()
                        ->where('slug', 'instructor')
                        ->exists()
                )
            ) {
                return redirect()
                    ->route('admin.dashboard');
            }

            /*
            |--------------------------------------------------------------------------
            | Default Authenticated User
            |--------------------------------------------------------------------------
            */

            return redirect(
                RouteServiceProvider::HOME
            );
        }

        return $next($request);
    }
}