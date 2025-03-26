<?php

namespace App\Livewire;

use App\Models\Report;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ManageTagging extends Component
{
    public $reportId;
    public $newStatus;
    public $statuses = ['Repaired', 'On Going', 'Unfixed'];
    protected $rules = [
        'newStatus' => 'required|in:Repaired,On Going,Unfixed',
    ];
//    public function mount($reportId, $currentStatus)
//    {
//        $this->reportId = $reportId;
//        $this->newStatus = $currentStatus;
//    }
    public function updateStatus()
    {
        $this->validate();

        $report = Report::find($this->reportId);

        if ($report) {
            $report->status = $this->newStatus;
            $report->save();

            Session::flash('success', 'Report status updated successfully!');
        } else {
            Session::flash('error', 'Report not found.');
        }
    }

    public function render()
    {
        return view('livewire.manage-tagging')
        ->layout('layouts.app');
    }
}
