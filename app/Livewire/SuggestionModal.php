<?php

namespace App\Livewire;

use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use App\Models\Suggestion;
use App\Models\SystemLog;
use App\Models\TemporaryReport;
use App\Models\TemporaryUpdate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

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
            $this->nearbyReports = $this->existingReports = Report::where('location', $temporaryReport->location)
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

    try {
        DB::beginTransaction();

        try {
            $temporaryReport = TemporaryReport::where('reporter_id', $userId)->first();
            if (!$temporaryReport) {
                throw new \Exception('Temporary report not found.');
            }
        } catch (\Exception $e) {
            throw new \Exception('Error fetching temporary report: ' . $e->getMessage());
        }

        try {
            $reportSelected = Report::whereIn('id', $this->selectedReports)->first();
            if (!$reportSelected) {
                throw new \Exception('Selected report not found.');
            }
        } catch (\Exception $e) {
            throw new \Exception('Error fetching selected report: ' . $e->getMessage());
        }

        try {
            $suggest = Suggestion::create([
                'report_id' => $reportSelected->id,
                'reporter_id' => $userId,
                'is_match' => true,
                'response_deadline' => now()->addDays(5),
                'defect' => $reportSelected->defect,
                'lat' => $reportSelected->lat,
                'lng' => $reportSelected->lng,
                'location' => $reportSelected->location,
                'street' => $reportSelected->street,
                'purok' => $reportSelected->purok,
                'barangay' => $reportSelected->barangay,
                'date' => now()->format('Y-m-d'),
                'time' => now()->format('H:i:s'),
                'severity' => $reportSelected->severity,
                'label' => $reportSelected->label,
                'image' => $temporaryReport->image ?? null,
                'image_annotated' => $temporaryReport->image_annotated ?? null,
                'status' => "Unfixed"
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create suggestion: ' . $e->getMessage());
        }

        $this->isOpen = false;

        try {
            $reportSelected->report_count++;

            if ($reportSelected->report_count >= 10) {
                $reportSelected->label = 4;
                $reportSelected->severity = 4;

                SystemLog::create([
                    'transaction_id' => $reportSelected->id,
                    'user_id' => Auth::id(),
                    'action' => 'Report ID ' . $reportSelected->id . ' reached 10+ reports. Label and severity set to 4.',
                    'type' => 'report_update',
                ]);

            } elseif ($reportSelected->report_count >= 5) {
                $reportSelected->label = 3;
                $reportSelected->severity = 3;

                SystemLog::create([
                    'transaction_id' => $reportSelected->id,
                    'user_id' => Auth::id(),
                    'action' => 'Report ID ' . $reportSelected->id . ' reached 5+ reports. Label and severity set to 3.',
                    'type' => 'report_update',
                ]);

            } elseif ($reportSelected->report_count >= 3) {
                $reportSelected->label = 2;
                $reportSelected->severity = 2;

                SystemLog::create([
                    'transaction_id' => $reportSelected->id,
                    'user_id' => Auth::id(),
                    'action' => 'Report ID ' . $reportSelected->id . ' reached 3+ reports. Label and severity set to 2.',
                    'type' => 'report_update',
                ]);

            } elseif ($reportSelected->report_count >= 1) {
                $reportSelected->label = 1;
                $reportSelected->severity = 1;

                SystemLog::create([
                    'transaction_id' => $reportSelected->id,
                    'user_id' => Auth::id(),
                    'action' => 'Report ID ' . $reportSelected->id . ' received first report. Label and severity set to 1.',
                    'type' => 'report_update',
                ]);
            }

            $reporter = Auth::user();
            $reportSelected->save();

        } catch (\Exception $e) {
            throw new \Exception('Error updating report count: ' . $e->getMessage());
        }


        try {
            $reporter = Auth::user();
            if (!$reporter) {
                throw new \Exception('Authenticated user not found.');
            }
        } catch (\Exception $e) {
            throw new \Exception('Error retrieving reporter: ' . $e->getMessage());
        }

        try {
            $admins = User::where('user_type', 1)->get();
            $staff = Staff::with('user')->get();

            if ($admins->isEmpty() && $staff->isEmpty()) {
                throw new \Exception('No admins or staff found.');
            }
        } catch (\Exception $e) {
            throw new \Exception('Error fetching admins/staff: ' . $e->getMessage());
        }

        try {
            $firstName = Crypt::decryptString($reporter->first_name);
            $lastName = Crypt::decryptString($reporter->last_name);
        } catch (\Exception $e) {
            $firstName = '[Unknown]';
            $lastName = '';
        }

        $notificationData = [
            'report_id' => $suggest->id,
            'title' => 'Report Created',
            'message' => "A new report has been submitted by {$firstName} {$lastName} at {$temporaryReport->location}.",
            'is_read' => false,
        ];

        try {
            $this->notifyUsers($admins, $notificationData, User::class);

            if ($reporter->user_type !== 3) {
                $this->notifyUsers($staff, $notificationData, Staff::class);
            }
        } catch (\Exception $e) {
            Log::warning('Notification to admin/staff failed: ' . $e->getMessage());
        }

        try {
            Notification::create([
                'report_id' => $suggest->id,
                'title' => 'Report Submitted',
                'message' => "You submitted a new road issue successfully at {$temporaryReport->location}.",
                'notifiable_id' => $reporter->id,
                'notifiable_type' => User::class,
                'is_read' => false,
            ]);
        } catch (\Exception $e) {
            Log::warning('Notification to reporter failed: ' . $e->getMessage());
        }

        try {
            $temporaryReport->delete();
        } catch (\Exception $e) {
            Log::warning('Failed to delete temporary report: ' . $e->getMessage());
        }

        DB::commit();

        session()->forget('suggestion-exist');
        session()->flash('feedback', 'Report submitted successfully!');
        session()->flash('feedback_type', 'success');
        return $this->redirect('/residents/report-road-issue', navigate: true);

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('SuggestionSubmit Error: ' . $e->getMessage());

        session()->flash('error', 'Something went wrong while submitting the report.');
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
	session()->forget('suggestion-exist');
        session()->flash('feedback', 'Report submitted successfully!');
        session()->flash('feedback_type', 'success');
    }
    public function render()
    {
        return view('livewire.suggestion-modal');
    }
}
