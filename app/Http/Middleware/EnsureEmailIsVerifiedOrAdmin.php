<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerifiedOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user){
            return redirect()->route('login');
        }

        //Admin bypass verification
        if ($user->isAdmin()){
            return $next($request);
        }

        //Require verification for every one else
        if (!$user->hasVerifiedEmail()){
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}
