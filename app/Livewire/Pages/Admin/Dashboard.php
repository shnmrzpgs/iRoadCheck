<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Staff;
use App\Models\StaffRole;
use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Dashboard extends Component
{
    public int $totalStaff = 0;
    public $activeStaffCount;
    public $inactiveStaffCount;
    public $staffRolesData;
    public Collection $roles;
    public $chartData;
    public int $selectedYear;

    public int $totalReport = 0;
    public $unfixedReportCount;
    public $fixedReportCount;
    public $ongoingReportCount;

    public array $years = [];

    public array $filters = [
        'sort' => '',
        'staffRole' => '',
    ];

    public function mount(): void
    {
        $this->years = Report::select(DB::raw('DISTINCT YEAR(date) as year'))
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        $this->selectedYear = Carbon::now()->year;

        $this->updateStaffCount();
        $this->activeStaffCount = Staff::where('status', 'Active')->count();
        $this->inactiveStaffCount = Staff::where('status', 'Inactive')->count();

        $this->roles = StaffRole::whereHas('staffs')->get();
        $this->getStaffRolesData();

        $this->updateReportsCount();
        $this->unfixedReportCount = Report::where('status', 'Unfixed')->count();
        $this->fixedReportCount = Report::where('status', 'Fixed')->count();
        $this->ongoingReportCount = Report::where('status', 'Ongoing')->count();
        $this->loadChartData();
    }

    public function loadChartData(): void
    {
        $year = $this->selectedYear;
        $defectTypes = Report::select('defect')
            ->whereYear('date', $year)
            ->distinct()
            ->pluck('defect');

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

            if (!empty($monthlyData)) {
                $seriesData[] = [
                    'name' => $defect,
                    'data' => $monthlyData,
                    'color' => $colors[$defect] ?? '#' . substr(md5($defect), 0, 6),
                ];
            }
        }

        if (!empty($seriesData)) {
            $this->chartData = [
                'series' => $seriesData
            ];

            // Update related counts for the selected year
            $this->unfixedReportCount = Report::whereYear('date', $year)->where('status', 'Unfixed')->count();
            $this->fixedReportCount = Report::whereYear('date', $year)->where('status', 'Fixed')->count();
            $this->ongoingReportCount = Report::whereYear('date', $year)->where('status', 'Ongoing')->count();
            $this->totalReport = Report::whereYear('date', $year)->count();

            // Dispatch with the complete chart data
            $this->dispatch('chartDataUpdated', $this->chartData);
        }
    }

    public function updatedSelectedYear($value): void
    {
        if (is_numeric($value) && in_array((int)$value, $this->years)) {
            $this->selectedYear = (int)$value;
            $this->loadChartData();
        }
    }


    public function getStaffRolesData(): void
    {
        $query = StaffRole::query();

        // Apply role filter if selected
        if (!empty($this->filters['staffRole'])) {
            $query->where('id', $this->filters['staffRole']);
        }

        $staffRoles = $query->get();

        $rolesData = $staffRoles->map(function ($role) {
            // Get all staff members for this role
            $staffMembers = Staff::whereHas('staffRolesPermissions', function ($query) use ($role) {
                $query->where('staff_role_id', $role->id);
            })->with('user')->get();

            $count = $staffMembers->count();

            if ($count > 0) {
                return [
                    'name' => $role->name,
                    'count' => $count,
                    'members' => $staffMembers->map(function ($staff) {
                        return [
                            'name' => trim(
                                ($staff->user->first_name ?? '') . ' ' .
                                    ($staff->user->middle_name ?? '') . ' ' .
                                    ($staff->user->last_name ?? '')
                            ),
                            'avatar' => $staff->user->profilePhoto?->photo_path ?? null,
                        ];
                    })->values()->all(),
                ];
            }

            return null;
        })->filter()->values();

        // Sort roles by count based on filter
        if ($this->filters['sort'] === 'asc') {
            $rolesData = $rolesData->sortBy('count');
        } elseif ($this->filters['sort'] === 'desc') {
            $rolesData = $rolesData->sortByDesc('count');
        }

        $this->staffRolesData = $rolesData->values();
    }

    public function updatedFilters(): void
    {
        $this->getStaffRolesData();
    }

    public function updateStaffCount(): void
    {
        $this->totalStaff = Staff::count();
    }

    public function updateReportsCount(): void
    {
        $this->totalReport = Report::count();
    }

    public function resetFilters(): void
    {
        $this->filters = [
            'sort' => '',
            'staffRole' => '',
        ];
        $this->getStaffRolesData();
    }


    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        session()->forget('hideSearchBar');
        return view('livewire.pages.admin.dashboard');
    }
}
