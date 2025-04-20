<?php

namespace App\Livewire\Pages\Staff;

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
    public $search = '';

    public int $totalReport = 0;
    public $unfixedReportCount;
    public $fixedReportCount;
    public $ongoingReportCount;
    public $selectedBarangay = '';

    public function mount(): void
    {
        $this->selectedYear = Carbon::now()->year;
        $this->updateReportCounts(true); // Pass true to indicate initial load
        $this->loadChartData();
    }

    public function loadChartData(): void
    {
        $year = $this->selectedYear;

        $query = Report::whereYear('date', $year);

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('defect', 'like', '%' . $this->search . '%')
                    ->orWhere('barangay', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%');
            });
        }

        // Apply barangay filter if selected
        if (!empty($this->selectedBarangay)) {
            $query->where('barangay', $this->selectedBarangay);
        }

        $defectTypes = $query->select('defect')->distinct()->pluck('defect');
        $seriesData = [];

        $colors = [
            'Alligator Crack' => '#FFAD00',
            'Pothole' => '#7E91FF',
            'Cracks' => '#4AA76F',
            'Raveling' => '#E26161',
            'Spalling' => '#D570D6',
        ];

        foreach ($defectTypes as $defect) {
            $monthlyData = [];
            for ($month = 1; $month <= 12; $month++) {
                $count = clone $query; // Clone query to avoid conflicts
                $monthlyData[] = $count->whereMonth('date', $month)
                    ->where('defect', $defect)
                    ->count();
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

        $this->dispatch('chartDataUpdated', $this->chartData);
    }

    public function updateReportCounts($initialLoad = false): void
    {
        $query = Report::query();

        // On initial load, get overall counts without any year filter
        if ($initialLoad) {
            // Apply search filter if not initial load
            if (!empty($this->search)) {
                $query->where(function ($q) {
                    $q->where('defect', 'like', '%' . $this->search . '%')
                        ->orWhere('barangay', 'like', '%' . $this->search . '%')
                        ->orWhere('status', 'like', '%' . $this->search . '%');
                });
            }

            // Apply barangay filter if not initial load
            if (!empty($this->selectedBarangay)) {
                $query->where('barangay', $this->selectedBarangay);
            }

            $this->totalReport = $query->count();
            $this->unfixedReportCount = clone $query;
            $this->fixedReportCount = clone $query;
            $this->ongoingReportCount = clone $query;

            $this->unfixedReportCount = $this->unfixedReportCount->where('status', 'Unfixed')->count();
            $this->fixedReportCount = $this->fixedReportCount->where('status', 'Repaired')->count();
            $this->ongoingReportCount = $this->ongoingReportCount->where('status', 'Ongoing')->count();
        } else {
            // When filtering, apply year and other filters
            // Apply search filter
            if (!empty($this->search)) {
                $query->where(function ($q) {
                    $q->where('defect', 'like', '%' . $this->search . '%')
                        ->orWhere('barangay', 'like', '%' . $this->search . '%')
                        ->orWhere('status', 'like', '%' . $this->search . '%');
                });
            }

            // Apply barangay filter
            if (!empty($this->selectedBarangay)) {
                $query->where('barangay', $this->selectedBarangay);
            }

            // Apply year filter
            $query->whereYear('date', $this->selectedYear);

            $this->totalReport = $query->count();
            $this->unfixedReportCount = clone $query;
            $this->fixedReportCount = clone $query;
            $this->ongoingReportCount = clone $query;

            $this->unfixedReportCount = $this->unfixedReportCount->where('status', 'Unfixed')->count();
            $this->fixedReportCount = $this->fixedReportCount->where('status', 'Repaired')->count();
            $this->ongoingReportCount = $this->ongoingReportCount->where('status', 'Ongoing')->count();
        }
    }

    public function updatedSearch(): void
    {
        $this->updateReportCounts(); // Now uses filters
        $this->loadChartData();
    }

    public function updatedSelectedBarangay(): void
    {
        $this->updateReportCounts(); // Now uses filters
        $this->loadChartData();
    }

    public function updatedSelectedYear(): void
    {
        $this->updateReportCounts(); // Now uses filters
        $this->loadChartData();
    }

    public function resetFilters(): void
    {
        $this->search = '';
        $this->selectedBarangay = '';
        $this->selectedYear = Carbon::now()->year;

        $this->updateReportCounts(true); // Reload counts with default values
        $this->loadChartData(); // Reload charts
    }


    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        session(['hideSearchBar' => true]);

        $barangays = Report::select('barangay')->distinct()->pluck('barangay');
        $years = Report::selectRaw('DISTINCT YEAR(date) as year')->pluck('year');

        return view('livewire.pages.staff.dashboard', [
            'barangays' => $barangays,
            'years' => $years
        ]);
    }
}
