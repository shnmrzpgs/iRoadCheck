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

class ResidentAuth extends Controller
{
//    protected $smsService;
//
//    public function __construct(PhilSMSService $smsService)
//    {
//        $this->smsService = $smsService;
//    }
    public function signup(Request $request)
    {
    $validated  = $request->validate([
        'phone' => ['required',
            'regex:/^0[0-9]{10}$/'], // Ensure it starts with 0 and is 11 digits
    ]);
        $phone = $validated['phone'];
        // Replace the leading 0 with +63
        $formattedPhone = preg_replace('/^0/', '+63', $phone);

        // Check if the phone exists in the residents table
        $exists = DB::table('residents')->where('phone', $formattedPhone)->exists();

        if ($exists) {
            return back()->with(['error' => 'Phone number is already used.']);
        } else {
            $user = User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'sex' => $request->sex,
                'user_type' => 2,
                'password' => bcrypt($request->password),
            ]);
            // Generate a 6-digit code
            $verificationCode = random_int(100000, 999999);

            // Create a corresponding resident
            DB::table('residents')->insert([
                'user_id' => $user->id,
                'phone' => $formattedPhone,
                'code' => $verificationCode,
                'is_activated' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // Log in the user
            Auth::login($user);

            $recipient = $formattedPhone;
            // Set of greeting messages
            $greetings = [
                'Hello! Thanks for signing up for an account. Your verification code is: ',
                'Hi there! We received your request. Your verification code is: ',
                'Greetings! Your verification code is: ',
                'Welcome! Please use the following verification code: ',
                'Hey! Your account setup is almost complete. Use this verification code: ',
            ];

            // Randomly select a greeting message
            $randomGreeting = $greetings[array_rand($greetings)];

            // Final message
            $message = $randomGreeting . $verificationCode;
            SendSMSJob::dispatch($formattedPhone, $message);
            return redirect()->route('verify-code');
        }
    }


    public function verifycodeView(){
        return view('iroadcheck.prototype.residents.verify-user-enterCode');
    }
}
