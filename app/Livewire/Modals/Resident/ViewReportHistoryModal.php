<?php
namespace App\Livewire\Modals\Resident;

use App\Models\Suggestion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Log;


class ViewReportHistoryModal extends Component
{
    public $report;
    public $image;
    public $showModal = false;

    protected $listeners = ['show-view-report-history-modal' => 'showModal'];

    public function showModal($reportId)
    {
        Log::info('Received report ID:', ['reportId' => $reportId]);
        $this->report = Suggestion::where('id', $reportId)
            ->where('reporter_id', Auth::id())
            ->first()
            ?? Report::where('id', $reportId)
                ->where('reporter_id', Auth::id())
                ->firstOrFail();
        if (!$this->report) {
            Log::error('Report not found', ['reportId' => $reportId]);
            return;
        }
        $this->image = asset('storage/' . $this->report->image_annotated);

        $this->dispatch('view-report-history-modal-shown');
    }


    public function render()
    {
        return view('livewire.modals.resident.view-report-history-modal');
    }
}
