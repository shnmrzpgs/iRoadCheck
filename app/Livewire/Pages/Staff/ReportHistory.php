<?php

namespace App\Livewire\Pages\Staff;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Report;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use App\Exports\HistoryReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportHistory extends Component
{
    use WithPagination;

    use WithPagination;

    public $start_date, $end_date, $date_range_filter;
    public $sort_by = 'date';
    public $sort_direction = 'desc';
    public int $rowsPerPage = 10;

    public $selectedDefect = '';
    public $selectedBarangay = '';
    public $selectedStatus = '';

    public $defectTypes = [];
    public $barangays = [];
    public $statuses = [];
    public $search = '';
    public ?Report $history_report_to_viewed = null;

    public function mount()
    {
        $this->start_date = now()->subMonth()->format('Y-m-d');
        $this->end_date = now()->format('Y-m-d');

        // Fetch distinct values from reports
        $this->defectTypes = Report::where('updater_id', Auth::id())->pluck('defect')->unique()->toArray();
        $this->barangays = Report::where('updater_id', Auth::id())->pluck('barangay')->unique()->toArray();
        $this->statuses = Report::where('updater_id', Auth::id())->pluck('status')->unique()->toArray();
    }

    public function toggleSorting($column)
    {
        if ($this->sort_by === $column) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $column;
            $this->sort_direction = 'asc';
        }
    }

    public function resetFiltersAndSearch(): void
    {
        $this->selectedDefect = '';
        $this->selectedBarangay = '';
        $this->selectedStatus = '';
        $this->search = '';
        $this->date_range_filter = '';
        $this->start_date = now()->subMonth()->format('Y-m-d');
        $this->end_date = now()->format('Y-m-d');
        $this->sort_by = 'id';
        $this->resetPage();
    }

    public function updatedRowsPerPage(): void
    {
        $this->resetPage();
    }

    public function updatingRowsPerPage(): void
    {
        // Reset pagination when rows per page is updated
        $this->resetPage();
    }

    public function updatingDateRangeFilter($value)
    {
        if ($value) {
            $dates = explode(' to ', $value);
            $this->start_date = $dates[0] ?? $this->start_date;
            $this->end_date = $dates[1] ?? $this->end_date;
        }
    }

    protected function getFilteredQuery()
    {
        $query = Report::where('updater_id', Auth::id());

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('defect', 'like', "%{$this->search}%")
                    ->orWhere('barangay', 'like', "%{$this->search}%")
                    ->orWhere('status', 'like', "%{$this->search}%")
                    ->orWhere('created_at', 'like', "%{$this->search}%");
            });
        }

        if (!empty($this->selectedDefect)) {
            $query->where('defect', $this->selectedDefect);
        }

        if (!empty($this->selectedBarangay)) {
            $query->where('barangay', $this->selectedBarangay);
        }

        if (!empty($this->selectedStatus)) {
            $query->where('status', $this->selectedStatus);
        }


        return $query->orderBy($this->sort_by, $this->sort_direction);
    }

    public function viewHistoryReports($reportId): void
    {
        Log::info("viewHistoryReports triggered with ID: " . $reportId);
        $this->dispatch('show-view-report-history-modal', reportId: $reportId);
    }


    public function exportHistoryReports()
    {
        try {
            $filters = [
                'defect' => $this->selectedDefect,
                'barangay' => $this->selectedBarangay,
                'status' => $this->selectedStatus,
                'search' => $this->search,
            ];

            $reports = $this->getFilteredQuery()->get();

            return Excel::download(
                new HistoryReportExport($reports, $filters),
                'history_report_' . now()->format('Y-m-d_His') . '.xlsx',

            );
        } catch (\Exception $e) {
            Log::error('History report export failed: ' . $e->getMessage());
            $this->dispatch('notification', [
                'type' => 'error',
                'title' => 'Export Failed',
                'message' => 'Failed to export staff data. Please try again.'
            ]);
        }
    }

    public function render(): Factory|View|Application
    {
        session()->forget('hideSearchBar');
        // Apply pagination and pass directly to the view
        $reports = $this->getFilteredQuery()->paginate($this->rowsPerPage);
        Log::info("Reports retrieved in render: " . $reports->count());

        return view('livewire.pages.staff.report-history', [
            'reports' => $reports
        ]);
    }
}
