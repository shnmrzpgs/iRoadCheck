<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ResidentForgot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user's user_type is 2
            if ($user->user_type == 2) {
                // Check if the user exists in the residents table and is_activated is 1
                $resident = DB::table('residents')
                    ->where('user_id', $user->id)
                    ->first();

                if (!$resident ) {
                    return redirect()->route('residents-login');
                }

            }

        } else{
            return redirect()->route('residents-login');
        }
        return $next($request);
    }
}
