<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PhilSMSService
{
    protected $apiKey;
    protected $senderId;

    public function __construct()
    {
        $this->apiKey = config('services.philsms.token');
        $this->senderId = config('services.philsms.sender_id');
    }


    public function sendSMS($recipient, $message)
    {
        $url = 'https://app.philsms.com/api/v3/sms/send';

        $send_data = [];

// START - Parameters to Change
// Put the SID here
        $send_data['sender_id'] = $this->senderId;
// Put the number(s) here (separate by comma if multiple) w/ the country code +63
        $send_data['recipient'] = $recipient;
// Put message content here
        $send_data['message'] = $message;

// Sending the HTTP request
        try {
            return Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])->post($url, $send_data);
        } catch (\Exception $e) {
            // Handle exceptions if needed
            throw new \Exception("Failed to send SMS: " . $e->getMessage());
        }
    }
}
