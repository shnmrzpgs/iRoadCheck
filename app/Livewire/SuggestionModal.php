<?php

namespace App\Livewire;

use App\Models\Report;
use App\Models\Suggestion;
use App\Models\TemporaryReport;
use App\Models\TemporaryUpdate;
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
            $this->nearbyReports = $this->existingReports = Report::where([
                ['lat', '=', $temporaryReport->latitude],
                ['lng', '=', $temporaryReport->longitude],
                ['street', '=', $temporaryReport->street],
                ['barangay', '=', $temporaryReport->barangay],
                ['location', '=', $temporaryReport->location]
            ])->get();
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
            Suggestion::create([
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
    public function render()
    {
        return view('livewire.suggestion-modal');
    }
}
