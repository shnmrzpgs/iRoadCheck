<?php

namespace App\Livewire;


use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use App\Models\Suggestion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\TemporaryReport;
use Illuminate\Support\Facades\Session;

class ReviewReport extends Component
{
    public $report;
    public $isOpen = false;

    public function mount()
    {
        $userId = \Auth::id(); // Get authenticated user ID

        if ($userId) {
            // Retrieve the first unopened report for the user
            $this->report = TemporaryReport::where('reporter_id', $userId)
                ->where('is_opened', 0) // Ensure it's actually false (or use 0)
                ->first();

            if ($this->report) {
                // Mark as opened only if it's not already updated
                if (!$this->report->is_opened) {
                    $this->report->update(['is_opened' => 1]); // Update column
                    $this->isOpen = true; // Open the modal
                } else {
                    $this->isOpen = false; // Ensure modal doesn't show again
                }
            } else {
                $this->isOpen = false; // No report, so keep modal closed
            }
        }
    }



    public function closeModal()
    {
        $userId = Auth::id();

        // Find the user's temporary report
        $temporaryReport = TemporaryReport::where('reporter_id', $userId)->first();

        $this->isOpen = false;
        $temporaryReport->delete();
    }

    public function submitReport()
    {
        $userId = Auth::id();

        // Find the user's temporary report
        $temporaryReport = TemporaryReport::where('reporter_id', $userId)->first();



        if ($temporaryReport) {
            // Check if report already exists
            $existingReport = Report::select('*')
                ->where('location', $temporaryReport->location)
                ->whereRaw(
                    "ST_Distance_Sphere(
            point(lng, lat),
            point(?, ?)
        ) <= 5", [
                        $temporaryReport->lng,
                        $temporaryReport->lat
                    ]
                )
                ->get();

            if ($existingReport->count() == 0) {

                // Create a new record in the reports table
                $report = Report::create([
                    'reporter_id' => $temporaryReport->reporter_id,
                    'defect' => $temporaryReport->defect,
                    'lat' => $temporaryReport->lat,
                    'lng' => $temporaryReport->lng,
                    'location' => $temporaryReport->location,
                    'street' => $temporaryReport->street,
                    'purok' => $temporaryReport->purok,
                    'barangay' => $temporaryReport->barangay,
                    'date' => $temporaryReport->date,
                    'time' => $temporaryReport->time,
                    'severity' => $temporaryReport->severity,
                    'image' => $temporaryReport->image,
                    'image_annotated' => $temporaryReport->image_annotated,
                    'status' => $temporaryReport->status,
                    'label' => $temporaryReport->label,
                ]);
                $reporter = Auth::user();

                // ✅ Fetch Admins and Staff
                $admins = User::where('user_type', 1)->get();
                $staff = Staff::with('user')->get();

                if ($admins->isEmpty() && $staff->isEmpty()) {
                    throw new \Exception('No admins or staff found.');
                }

                // ✅ Admin & Staff Notification
                $notificationData = [
                    'report_id' => $report->id,
                    'title' => 'Report Created',
                    'message' => "A new report has been submitted by {$reporter->name} at {$temporaryReport->location}.",
                    'is_read' => false,
                ];

                // ✅ Notify Admins
                $this->notifyUsers($admins, $notificationData, User::class);

                // ✅ Notify Staff only if the reporter is NOT a staff member
                if ($reporter->user_type !== 3) {
                    $this->notifyUsers($staff, $notificationData, Staff::class);
                }

                // ✅ Reporter Notification - Corrected Message
                Notification::create([
                    'report_id' => $report->id,
                    'title' => 'Report Submitted',
                    'message' => "You submitted a new road issue successfully at {$temporaryReport->location}.",
                    'notifiable_id' => $reporter->id,
                    'notifiable_type' => User::class,
                    'is_read' => false,
                ]);

                // Optionally delete the temporary report after copying
                $temporaryReport->delete();
                $this->isOpen = false;
                session()->flash('feedback', 'Report submitted successfully!');
                session()->flash('feedback_type', 'success');
            } else{
                $this->isOpen = false;
                $temporaryReport->is_opened = 2;
                $temporaryReport->save();
                session()->flash('suggestion-exist', 'This suggestion already exists.');

            }




//            return redirect()->back()->with('success', 'Report copied successfully');

        }

        return response()->json(['error' => 'No temporary report found'], 404);
    }
    private function notifyUsers($users, $notificationData, $notifiableType)
    {
        foreach ($users as $user) {
            Notification::create(array_merge($notificationData, [
                'notifiable_id' => $user->id ?? $user->user_id,
                'notifiable_type' => $notifiableType,
            ]));
//            Log::info("Notification sent to {$notifiableType} ID: {$user->id ?? $user->user_id}");
        }
    }

    public function render()
    {
        return view('livewire.review-report');
    }
}

