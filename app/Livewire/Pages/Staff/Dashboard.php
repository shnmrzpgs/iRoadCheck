<?php

namespace App\Livewire\Pages\Staff;

use App\Models\Staff;
use App\Models\StaffRole;
use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $chartData;
    public int $selectedYear;

    public int $totalReport = 0;
    public $unfixedReportCount;
    public $fixedReportCount;
    public $ongoingReportCount;

    public function mount(): void
    {
        $this->updateReportsCount();
        $this->unfixedReportCount = Report::where('status', 'Unfixed')->count();
        $this->fixedReportCount = Report::where('status', 'Fixed')->count();
        $this->ongoingReportCount = Report::where('status', 'Ongoing')->count();

        $this->selectedYear = Carbon::now()->year;
        $this->loadChartData();
    }

    public function loadChartData(): void
    {
        $year = $this->selectedYear;

        $defectTypes = Report::select('defect')->distinct()->pluck('defect');
        $seriesData = [];

        $colors = [
            'Alligator Crack' => '#FFAD00',
            'Pothole' => '#7E91FF',
            'Cracks' => '#4AA76F',
            'Raveling' => '#E26161',
        ];

        foreach ($defectTypes as $defect) {
            $monthlyData = [];
            for ($month = 1; $month <= 12; $month++) {
                $count = Report::whereYear('date', $year)
                    ->whereMonth('date', $month)
                    ->where('defect', $defect)
                    ->count();
                $monthlyData[] = $count;
            }

            $seriesData[] = [
                'name' => $defect,
                'data' => $monthlyData,
                'color' => $colors[$defect] ?? '#' . substr(md5($defect), 0, 6),
            ];
        }

        $this->chartData = [
            'categories' => [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
            'series' => $seriesData
        ];

        // Emit event so JavaScript updates the chart
        $this->dispatch('chartDataUpdated', $this->chartData);
    }



    public function updatedSelectedYear(): void
    {
        $this->loadChartData();
    }

    public function updateReportsCount(): void
    {
        $this->totalReport = Report::count();
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        session()->forget('hideSearchBar');
        return view('livewire.pages.staff.dashboard');
    }
}
