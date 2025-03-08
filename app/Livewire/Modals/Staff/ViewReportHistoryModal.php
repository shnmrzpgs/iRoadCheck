<?php
namespace App\Livewire\Modals\Staff;

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
        $this->report = Report::findOrFail($reportId);
        if (!$this->report) {
            Log::error('Report not found', ['reportId' => $reportId]);
            return;
        }
        $this->image = asset('storage/' . $this->report->image);

        $this->dispatch('view-report-history-modal-shown');
    }


    public function render()
    {
        return view('livewire.modals.staff.view-report-history-modal');
    }
}
