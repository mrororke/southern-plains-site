<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Supports single or multiple roles:
     * role:admin
     * role:instructor
     * role:admin,instructor
     */
    public function handle(Request $request, Closure $next, string $role): Response
{
    $user = $request->user();

    if (!$user) {
        return redirect()->route('login');
    }

    // Admin always allowed everywhere
    if ($user->isAdmin()) {
        return $next($request);
    }

    // Convert "admin,instructor" → ['admin','instructor']
    $roles = array_map('trim', explode(',', $role));

    // Check if user has ANY matching role
    if (! $user->roles()->whereIn('slug', $roles)->exists()) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
}
}