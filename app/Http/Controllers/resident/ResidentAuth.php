<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Jobs\SendSMSJob;
use App\Models\Resident;
use App\Models\User;
use App\Services\PhilSMSService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ResidentAuth extends Controller
{
//    protected $smsService;
//
//    public function __construct(PhilSMSService $smsService)
//    {
//        $this->smsService = $smsService;
//    }
    // public function signup(Request $request)
    // {
    //     try {
    //         // Validate all inputs at once
    //         $validated = $request->validate([
    //             'first_name' => 'required|string|max:255',
    //             'middle_name' => 'nullable|string|max:255',
    //             'last_name' => 'required|string|max:255',
    //             'sex' => 'required|in:male,female',
    //             'phone' => [
    //                 'required',
    //                 'regex:/^0[0-9]{10}$/',
    //                 'size:11'
    //             ],
    //             'password' => [
    //                 'required',
    //                 'min:8',
    //                 'regex:/[a-z]/',      // At least one lowercase letter
    //                 'regex:/[A-Z]/',      // At least one uppercase letter
    //                 'regex:/[0-9]/',      // At least one number
    //                 'regex:/[!@#$%^&*]/', // At least one special character
    //             ],
    //             'confirmPassword' => 'required|same:password',
    //         ], [
    //             'phone.regex' => 'Phone number must start with 0 and be 11 digits long.',
    //             'password.min' => 'Password must be at least 8 characters.',
    //             'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
    //             'confirmPassword.same' => 'Passwords do not match.',
    //         ]);
            
    //         $phone = $validated['phone'];
    //         // Replace the leading 0 with +63
    //         $formattedPhone = preg_replace('/^0/', '+63', $phone);

    //         // Check if the phone exists in the residents table
    //         $phoneExists = false;

    //         $recipient = $formattedPhone;
    //         // Set of greeting messages
    //         $greetings = [
    //             'Hello! Thanks for signing up for an account. Your verification code is: ',
    //             'Hi there! We received your request. Your verification code is: ',
    //             'Greetings! Your verification code is: ',
    //             'Welcome! Please use the following verification code: ',
    //             'Hey! Your account setup is almost complete. Use this verification code: ',
    //         ];

    //         // Randomly select a greeting message
    //         $randomGreeting = $greetings[array_rand($greetings)];

    //         // Final message
    //         $message = $randomGreeting . $verificationCode;
    //         SendSMSJob::dispatch($formattedPhone, $message);
    //         return redirect()->route('verify-code');
    //     } catch (\Exception $e) {
    //         // Handle other exceptions
    //         Log::error('Error during signup: ' . $e->getMessage());
    //         return back()->with('error', 'An error occurred during signup. Please try again.');
    //     }
    // }

    public function verifyCode(Request $request)
    {
        // Validate the input
        $request->validate([
            'code' => 'required|digits:6', // Ensure the code is exactly 6 digits
        ]);

        // Get the input code from the form
        $verificationCode = $request->input('code');

        // Check if the verification code is correct
        $user = Auth::user();
        $resident = Resident::where('user_id', $user->id)->first();

        if ($resident && $resident->code == $verificationCode) {
            // Activate the account
            $resident->is_activated = 1;
            $resident->save();

            return redirect()->route('resident.dashboard')->with('success', 'Account activated successfully!');
        } else {
            return back()->with(['error' => 'The code is incorrect. Please try again.']);
        }
    }

  
}
