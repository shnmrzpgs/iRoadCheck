<?php

namespace App\Livewire\Pages\Resident;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public $sort_by = 'created_at';
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
        $userId = Auth::id();
        // Defect Types
        $this->defectTypes = collect(
            DB::table('reports')->select('defect')->where('reporter_id', $userId)
                ->union(
                    DB::table('suggestions')->select('defect')->where('reporter_id', $userId)
                )->get()
        )->pluck('defect')->unique()->toArray();

// Barangays
        $this->barangays = collect(
            DB::table('reports')->select('barangay')->where('reporter_id', $userId)
                ->union(
                    DB::table('suggestions')->select('barangay')->where('reporter_id', $userId)
                )->get()
        )->pluck('barangay')->unique()->toArray();

// Statuses
        $this->statuses = collect(
            DB::table('reports')->select('status')->where('reporter_id', $userId)
                ->union(
                    DB::table('suggestions')->select('status')->where('reporter_id', $userId)
                )->get()
        )->pluck('status')->unique()->toArray();
    }

    public function toggleSorting($column)
    {
        if ($this->sort_by === $column) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $column;
            $this->sort_direction = $column === 'created_at' ? 'desc' : 'asc';
        }
    }

    public function resetFiltersAndSearch()
    {
        $this->selectedDefect = '';
        $this->selectedBarangay = '';
        $this->selectedStatus = '';
        $this->search = '';
        $this->date_range_filter = '';
        $this->start_date = now()->subMonth()->format('Y-m-d');
        $this->end_date = now()->format('Y-m-d');
        $this->sort_by = 'created_at';
        $this->sort_direction = 'desc';
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
        $query = DB::table(function ($union) {
            $union->select(
                'reports.id', 'reports.reporter_id', 'reports.defect', 'reports.lat', 'reports.lng', 'reports.location',
                'reports.street', 'reports.purok', 'reports.barangay', 'reports.date', 'reports.time', 'reports.severity',
                'reports.image', 'reports.image_annotated', 'reports.status', 'reports.label', 'reports.created_at', 'reports.updated_at',
                'reports.updated_image', 'reports.updater_id', // Including fields from reports table
                'suggestions.id as suggestion_id', 'suggestions.report_id', 'suggestions.reporter_id as suggestion_reporter_id',
                'suggestions.defect as suggestion_defect', 'suggestions.lat as suggestion_lat', 'suggestions.lng as suggestion_lng',
                'suggestions.location as suggestion_location', 'suggestions.street as suggestion_street', 'suggestions.purok as suggestion_purok',
                'suggestions.barangay as suggestion_barangay', 'suggestions.date as suggestion_date', 'suggestions.time as suggestion_time',
                'suggestions.severity as suggestion_severity', 'suggestions.image as suggestion_image', 'suggestions.image_annotated as suggestion_image_annotated',
                'suggestions.status as suggestion_status', 'suggestions.label as suggestion_label', 'suggestions.created_at as suggestion_created_at',
                'suggestions.updated_at as suggestion_updated_at'
            )
                ->from('reports')
                ->where('reports.reporter_id', Auth::id())
                ->unionAll(
                    DB::table('suggestions')
                        ->join('reports', 'suggestions.report_id', '=', 'reports.id') // Join suggestion table with reports table
                        ->select(
                            'reports.id as report_id', 'reports.reporter_id', 'reports.defect', 'reports.lat', 'reports.lng', 'reports.location',
                            'reports.street', 'reports.purok', 'reports.barangay', 'reports.date', 'reports.time', 'reports.severity',
                            'reports.image', 'reports.image_annotated', 'reports.status', 'reports.label', 'reports.created_at', 'reports.updated_at',
                            'reports.updated_image', 'reports.updater_id', // Include fields from reports table
                            'suggestions.id as suggestion_id', 'suggestions.report_id', 'suggestions.reporter_id as suggestion_reporter_id',
                            'suggestions.defect as suggestion_defect', 'suggestions.lat as suggestion_lat', 'suggestions.lng as suggestion_lng',
                            'suggestions.location as suggestion_location', 'suggestions.street as suggestion_street', 'suggestions.purok as suggestion_purok',
                            'suggestions.barangay as suggestion_barangay', 'suggestions.date as suggestion_date', 'suggestions.time as suggestion_time',
                            'suggestions.severity as suggestion_severity', 'suggestions.image as suggestion_image', 'suggestions.image_annotated as suggestion_image_annotated',
                            'suggestions.status as suggestion_status', 'suggestions.label as suggestion_label', 'suggestions.created_at as suggestion_created_at',
                            'suggestions.updated_at as suggestion_updated_at'
                        )
                        ->where('suggestions.reporter_id', Auth::id())
                );
        }, 'combined_reports');


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
                'message' => 'Failed to export resident data. Please try again.'
            ]);
        }
    }

    public function render()
    {
        $reports = $this->getFilteredQuery()->paginate($this->rowsPerPage);
        Log::info("Reports retrieved in render: " . $reports->count());

        return view('livewire.pages.resident.report-history', [
            'reports' => $reports
        ]);
    }
}
