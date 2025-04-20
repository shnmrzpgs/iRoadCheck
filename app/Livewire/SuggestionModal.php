<?php

namespace App\Livewire;

use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use App\Models\Suggestion;
use App\Models\TemporaryReport;
use App\Models\TemporaryUpdate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SuggestionModal extends Component
{
    public $isOpen = false;
    public $report, $nearbyReports, $wew, $existingReports;
    public $selectedReports = [];
    public function mount()
    {
        $userId = \Auth::id(); // Get authenticated user ID
        // Find the user's temporary report
        $temporaryReport = TemporaryReport::where('reporter_id', $userId)
            ->where('is_opened', 2)->first();
        // Open modal if session exists
        if ($temporaryReport) {
            $this->nearbyReports = $this->existingReports = Report::where('street', $temporaryReport->street)
                ->where('barangay', $temporaryReport->barangay)
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
        }


        if (session()->has('suggestion-exist') || $temporaryReport ) {
            if ($this->nearbyReports && $this->nearbyReports->isNotEmpty()) {
                $this->isOpen = true;
            }
        }
    }
    public function SuggestionSubmit()
    {

        $userId = Auth::id();
        $temporaryReport = TemporaryReport::where('reporter_id', $userId)->first();

        try {
            DB::beginTransaction();

            $reportSelected = Report::whereIn('id', $this->selectedReports)->first();
            // Update selected reports with image and status
            $suggest = Suggestion::create([
                'report_id' => $reportSelected->id,
                'reporter_id' => Auth::id(),
                'is_match' => true, // Default to false until user confirms
                'response_deadline' => Carbon::now()->addDays(5), // Set deadline 5 days later
                'defect' => $reportSelected->defect,
                'lat' => $reportSelected->lat,
                'lng' => $reportSelected->lng,
                'location' => $reportSelected->address,
                'street' => $reportSelected->street,
                'purok' => $reportSelected->purok,
                'barangay' => $reportSelected->barangay,
                'date' => now()->format('Y-m-d'),
                'time' => now()->format('H:i:s'),
                'severity' => 1,
                'image' => $temporaryReport,
                'image_annotated' => $temporaryReport,
                'status' => "Unfixed"
            ]);

            DB::commit();
            $this->isOpen = false;
            $reportSelected->report_count++;
            // Update label based on the new report_count
            if ($reportSelected->report_count >= 50) {
                $reportSelected->label = 4;
            } elseif ($reportSelected->report_count >= 35) {
                $reportSelected->label = 3;
            } elseif ($reportSelected->report_count >= 20) {
                $reportSelected->label = 2;
            } elseif ($reportSelected->report_count >= 5) {
                $reportSelected->label = 1;
            }
            $reporter = Auth::user();

            // ✅ Fetch Admins and Staff
            $admins = User::where('user_type', 1)->get();
            $staff = Staff::with('user')->get();

            if ($admins->isEmpty() && $staff->isEmpty()) {
                throw new \Exception('No admins or staff found.');
            }

            // ✅ Admin & Staff Notification
            $notificationData = [
                'report_id' => $suggest->id,
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
                'report_id' => $suggest->id,
                'title' => 'Report Submitted',
                'message' => "You submitted a new road issue successfully at {$temporaryReport->location}.",
                'notifiable_id' => $reporter->id,
                'notifiable_type' => User::class,
                'is_read' => false,
            ]);

            // Optionally delete the temporary report after copying
            $this->isOpen = false;
            $reportSelected->save();
            $temporaryReport->delete();
            session()->flash('feedback', 'Report submitted successfully!');
            session()->flash('feedback_type', 'success');
            return $this->redirect('/residents/report-road-issue', navigate: true);

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong while updating reports.');
            return $this->redirect('/residents/report-road-issue', navigate: true);
        }
    }
    public function closeModal()
    {
        $this->isOpen = false;
        session()->forget('suggestion-exist');
    }
    public function newReport()
    {
        $userId = Auth::id();
        $temporaryReport = TemporaryReport::where('reporter_id', $userId)->first();

        if ($temporaryReport) {
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
        }
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
    }
    public function render()
    {
        return view('livewire.suggestion-modal');
    }
}
