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
            'username' => 'required|string', // Admin login by username
            'password' => 'required|min:8',   // Ensure password is provided
        ]);

        // Attempt to log the admin in using username and password
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'user_type' => 1])) {
            // Authentication passed, redirect to admin dashboard
            return redirect()->route('admin.dashboard'); // Adjust the route as needed
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages([
            'username' => 'The provided credentials do not match our records.',
            'password' => 'The provided password is incorrect.',
        ]);

    }

//    public function StaffSignIn(Request $request)
//    {
//        // Validate the incoming request data for staff and residents
//        $request->validate([
//            'email' => 'required|email', // Staff/resident login by email
//            'password' => 'required|min:8',
//        ]);
//
//        // Attempt to log the staff/resident in using email and password
//        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 3])) {
//            return redirect()->route('staff.dashboard'); // Adjust the route as needed
//        }
//
//        // If authentication fails
//        throw ValidationException::withMessages([
//            'email' => 'The provided credentials do not match our records.',
//            'password' => 'The provided password is incorrect.',
//        ]);
//    }
//
    public function showLoginForm()
    {
        return view('auth.login');  // Adjust to your actual login view
    }

    public function Logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('admin-sign-in-show')->with('success', 'You have been logged out successfully.');
    }
}

