<?php

namespace App\Jobs;

use App\Services\PhilSMSService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendSMSJob implements ShouldQueue
{
    use Queueable;

    protected $recipient;
    protected $message;

    // Constructor to pass data to the job
    public function __construct($recipient, $message)
    {
        $this->recipient = $recipient;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(PhilSMSService $smsService)
    {
        // Send the SMS
        $smsService->sendSMS($this->recipient, $this->message);
    }
}
