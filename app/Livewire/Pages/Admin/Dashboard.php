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
use Illuminate\Support\Facades\Crypt;
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
    public $selectedBarangay = '';
    public $search = '';

    public array $filters = [
        'sort' => '',
        'staffRole' => '',
        'selectedYear' => '',
        'barangay' => '',
    ];

    public function mount(): void
    {

        $this->selectedYear = Carbon::now()->year;
        $this->updateReportCounts(true);

        $this->updateStaffCount();
        $this->activeStaffCount = Staff::where('status', 'Active')->count();
        $this->inactiveStaffCount = Staff::where('status', 'Inactive')->count();

        $this->roles = StaffRole::whereHas('staffs')->get();
        $this->getStaffRolesData();

        $this->updateReportsCount();
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


    public function updatedSearch(): void
    {
        $this->updateReportCounts(); // Now uses filters
        $this->loadChartData();
    }

    public function resetFilter(): void
    {
        $this->search = '';
        $this->selectedBarangay = '';
        $this->selectedYear = Carbon::now()->year;

        $this->updateReportCounts(true); // Reload counts with default values
        $this->loadChartData(); // Reload charts
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
                        try {
                            return [
                                'name' => trim(
                                    (isset($staff->user->first_name) ? Crypt::decryptString($staff->user->first_name) : '') . ' ' .
                                        (isset($staff->user->middle_name) ? Crypt::decryptString($staff->user->middle_name) : '') . ' ' .
                                        (isset($staff->user->last_name) ? Crypt::decryptString($staff->user->last_name) : '')
                                ),
                                'avatar' => $staff->user->profilePhoto?->photo_path ?? null,
                            ];
                        } catch (\Exception $e) {
                            Log::error('Failed to decrypt user data: ' . $e->getMessage());
                            return [
                                'name' => 'Unavailable',
                                'avatar' => null
                            ];
                        }
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
            'selectedYear' => '',
            'barangay' => '',
        ];
        $this->getStaffRolesData();
    }


    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        session(['hideSearchBar' => true]);

        $barangays = Report::select('barangay')->distinct()->pluck('barangay');
        $years = Report::selectRaw('DISTINCT YEAR(date) as year')->pluck('year');

        return view('livewire.pages.admin.dashboard', [
            'barangays' => $barangays,
            'years' => $years
        ]);
    }
}
