<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\Staff;

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
//
//        // Validate the incoming request data for staff and residents
//        $request->validate([
//            'username' => 'required', // staff login by email
//            'password' => 'required|min:8',
//        ]);
//
//        //kuhaon generated password bycrypt then e convert into password
//        // Attempt to log the staff/resident in using email and password
//        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'user_type' => 3])) {
//            return redirect()->route('staff.dashboard'); // Adjust the route as needed
//        }
//
//        // If authentication fails
//        throw ValidationException::withMessages([
//            'username' => 'The provided credentials do not match our records.',
//            'password' => 'The provided password is incorrect.',
//        ]);
//    }

    public function showLoginForm()
    {
        return view('iroadcheck.prototype.Admin.login');  // Adjust to your actual login view
    }

    public function Logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('admin-sign-in-show')->with('success', 'You have been logged out successfully.');
    }


    public function showLoginFormStaff()
    {
        return view('iroadcheck.prototype.Staff.login');  // Adjust to your actual login view
    }

    public function StaffSignIn(Request $request)
    {
        // Step 1: Validate inputs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = Str::lower($request->input('username'));
        $ip = $request->ip();
        $key = "staff_login|{$username}|{$ip}";

        // Step 2: Check if the user is rate limited
        if (RateLimiter::tooManyAttempts($key, 2)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'timeout' => $seconds,
            ])->withInput();
        }

        // Step 3: Join with users to find the staff record, including staff status
        $staff = DB::table('staffs')
            ->join('users', 'staffs.user_id', '=', 'users.id')
            ->where('users.username', $username)
            ->where('users.user_type', 3)
            ->select('users.id as user_id', 'users.password', 'staffs.status')
            ->first();

        if (!$staff) {
            return back()->withErrors([
                'username' => 'Username not found or not a staff account.',
            ])->withInput();
        }

        // 🔒 Step 3.5: Check if staff is inactive
        if ($staff->status === 'inactive') {
            return back()->withErrors([
                'username' => 'This staff account is inactive. Please contact the administrator.',
            ])->withInput();
        }

        // Step 4: Check password manually
        if (!\Hash::check($request->password, $staff->password)) {
            RateLimiter::hit($key, 45);
            return back()->withErrors([
                'password' => 'Incorrect password.',
            ])->withInput();
        }

        // Step 5: Log the user in by ID
        Auth::loginUsingId($staff->user_id);

        // Step 6: Redirect to password change if first-time login
        $user = Auth::user(); // get logged in user
        if ($user->must_change_password) {
            return redirect()->route('staff.password.change');
        }

        RateLimiter::clear($key);
        return redirect()->route('staff.dashboard');
    }

    public function showChangePasswordForm()
    {
        return view('iroadcheck.prototype.Staff.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).+$/',
            ],
        ], [
            'password.regex' => 'Password must include at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character (!@#$%^&*).',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->must_change_password = false;
        $user->save();

        return redirect()->route('staff.dashboard')->with('success', 'Password changed successfully!');
    }



    public function LogoutStaff()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('staff-sign-in-show')->with('success', 'You have been logged out successfully.');
    }

    public function LogoutResident()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('residents-login')->with('success', 'You have been logged out successfully.');
    }
}

