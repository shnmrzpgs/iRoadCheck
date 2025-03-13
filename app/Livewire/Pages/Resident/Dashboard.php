<?php

namespace App\Livewire\Pages\Resident;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $reports = [];
    public $reportsCount = 0;

    public function mount()
    {
        $userId = Auth::id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $this->reports = DB::table('reports')
            ->where('reporter_id', $userId)
            ->select('id', 'defect as defectType', 'location', 'street', 'purok', 'barangay', 'status', 'date')
            ->orderBy('date', 'desc')
            ->get();

        $this->reportsCount = count($this->reports);
    }

    public function render()
    {
        return view('livewire.pages.resident.dashboard', [
            'reports' => $this->reports,
            'reportsCount' => $this->reportsCount
        ]);
    }
}
