<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PhilSMSService;
class SMSController extends Controller
{
    protected $smsService;

    public function __construct(PhilSMSService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function sendSMS()
    {
        $recipient = "+639054921464";
        $message = 'Kayatang enra oy gibyaan si azking.';

        $response = $this->smsService->sendSMS($recipient, $message);

        if ($response['status'] ?? false) {
            return response()->json(['success' => 'SMS sent successfully']);
        } else {
            return response()->json(['error' => $response['message']], 500);
        }
    }
}
