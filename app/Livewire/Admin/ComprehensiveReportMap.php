<?php

namespace App\Livewire\Admin;

use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class ComprehensiveReportMap extends Component
{
    public $reports = [];
    public $geoJsonData = [];

    public function mount(): void
    {
        $this->reports = Report::all();

        $path = public_path('geoJSON/tagumCityRoad.json'); // Adjust path if needed
        if (File::exists($path)) {
            $this->geoJsonData = json_decode(File::get($path), true);
        }
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
