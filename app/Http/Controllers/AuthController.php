<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function AdminSignIn(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8', // Adjust the minimum length as needed
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 1])) {
            // Authentication passed, redirect to intended location
            return redirect()->route('admin-dashboard'); // Change this to your desired route
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided password is incorrect.',
        ]);
    }
    public function Logout(){
        Auth::logout(); // Log the user out
        return redirect()->route('admin-sign-in')->with('success', 'You have been logged out successfully.');
    }
}
