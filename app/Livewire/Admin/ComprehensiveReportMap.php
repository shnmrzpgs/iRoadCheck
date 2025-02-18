<?php

namespace App\Livewire\Admin;

use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ComprehensiveReportMap extends Component
{
    public $reports = [];

    public function mount(): void
    {
        // Fetch reports when the component is mounted
        $this->reports = Report::all();
    }
    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.admin.comprehensive-report-map');
    }
}


//namespace App\Livewire\Admin;
//
//use App\Models\Report;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Livewire\Component;
//
//class ComprehensiveReportMap extends Component
//{
//    public $groupedReports = [];
//
//    public function mount(): void
//    {
//        $this->loadReports();
//    }
//
//    public function loadReports(): void
//    {
//        // Group reports by location (acts as barangay) and road defect type
//        $this->groupedReports = Report::selectRaw('location, defect, COUNT(*) as total_reports, MAX(date) as last_reported')
//            ->groupBy('location', 'defect')
//            ->orderBy('location')
//            ->get()
//            ->toArray();
//    }
//
//    public function render(): Factory|Application|View|\Illuminate\View\View
//    {
//        return view('livewire.admin.comprehensive-report-map', [
//            'groupedReports' => $this->groupedReports
//        ]);
//    }
//}
