<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Report;
use Livewire\Component;

#[AllowDynamicProperties] class ReportStatusUpdater extends Component
{
    public $reportId;
    public $newStatus;
    public $selectedReport;
    public function mount($reportId)
    {
        $this->reportId = $reportId;
        $this->selectedReport = Report::find($this->reportId);

//        $this->newStatus = $this->selectedReport->status; // Initialize newStatus with current status
    }

    public function updateReportStatus()
    {
        $this->selectedReport->status = $this->newStatus;
        $this->selectedReport->save();

        session()->flash('message', 'Report status updated successfully!');
    }

    public function render()
    {
        return view('livewire.report-status-updater');
    }
}
