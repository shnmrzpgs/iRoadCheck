<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PwaRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // Redirect if already in PWA and trying to access install
        if ($request->headers->has('X-PWA') || $request->headers->get('X-PWA') == 'true') {
            return redirect('resident/login');
        }

        return $next($request);
    }

//    private function isPWA(Request $request): bool
//    {
//        // Your working PWA checker
//        return $request->headers->has('X-PWA') && $request->headers->get('X-PWA') === 'true';
//    }
}
