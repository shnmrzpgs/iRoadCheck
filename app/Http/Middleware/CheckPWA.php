<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPWA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request has the PWA header
        if (!$request->headers->has('X-PWA') || $request->headers->get('X-PWA') !== 'true') {
            return redirect('resident/install')->with('error', 'Access denied: Only accessible from PWA.');
        }

        return $next($request);
    }
}
