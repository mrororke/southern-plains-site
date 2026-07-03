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

        // Admin always bypasses role checks
        if ($user->isAdmin()) {
            return $next($request);
        }

        // Support multiple roles via comma-separated string
        $roles = array_map('trim', explode(',', $role));

        // Check if user has ANY of the allowed roles
        if (! $user->roles()->whereIn('slug', $roles)->exists()) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}