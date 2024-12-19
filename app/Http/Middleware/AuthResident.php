<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthResident
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in and their user_type is 1
        if (Auth::check() && Auth::user()->user_type == 2) {
            return $next($request);
        }

        // Redirect or return an error if the user does not meet the conditions
        return redirect()->route('residents-login')->with('error', 'Access Denied');
    }
}
