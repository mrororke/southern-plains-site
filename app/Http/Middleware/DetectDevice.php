<?php

namespace App\Http\Middleware;

use Closure;
use Detection\MobileDetect;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class DetectDevice
{
    public function handle(Request $request, Closure $next): Response
    {
        $detect = new MobileDetect();

        /*
         * Mobile Detect considers both phones and tablets mobile.
         *
         * For now:
         * - Phones use the mobile layout.
         * - Tablets use the desktop layout.
         */
        $isMobile = $detect->isMobile() && ! $detect->isTablet();

        /*
         * Add the result to the current request.
         *
         * Controllers and other code can access it with:
         * request()->attributes->get('isMobile')
         */
        $request->attributes->set('isMobile', $isMobile);

        /* TODO Create a helper so that every route becomes: 
                return backendView(
                'dashboard', 
                ['navigation' => AdminNavigation::items(),
                ]);
        */

        View::share('isMobile', $isMobile);

        return $next($request);
    }
}