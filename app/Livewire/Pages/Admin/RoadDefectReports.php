<?php

namespace App\Livewire\Pages\Admin;

use App\Exports\AdminLogsExport;
use App\Exports\RoadDefectReportsExport;
use App\Models\Report;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class  RoadDefectReports extends Component
{
    use WithoutUrlPagination, WithPagination;

    // Search term
    public string $table_search = '';

    // Rows per page
    public int $rowsPerPage = 10;

    // Sorting
    public string $sort_by = 'id';
    public string $sort_direction = 'asc';

    // Selected Filters
    public string $statusFilter = '';
    public string $severityFilter = '';
    public string $barangayFilter = '';
    public string $selectedDefect = '';

    // Date Range Filter
    public ?string $start_date = null;
    public ?string $end_date = null;

    // Location Filter
    public string $locationFilter = '';

    // Arrays for dropdown options
    public array $defectTypes = [];
    public array $statuses = [];
    public array $barangays = [];
    public array $severities = [];
    public array $locations = [];

    public bool $isSearching = false;
    protected $listeners = ['refreshNavigation' => '$refresh'];

    /**
     * Initialize data for filters and dropdown options
     */
    public function mount(): void
    {
        if (request()->routeIs('admin.road-defect-reports')) {
            session()->put('hideSearchBar', true);
        } else {
            session()->forget('hideSearchBar');
        }

        $this->defectTypes = Report::distinct()->pluck('defect')->toArray();
        $this->statuses = Report::distinct()->pluck('status')->toArray();
        $this->barangays = Report::distinct()->pluck('barangay')->toArray();
        $this->severities = \App\Models\Severity::pluck('label', 'id')->toArray();
        $this->locations = Report::distinct()->pluck('street')->merge(Report::distinct()->pluck('purok'))->unique()->toArray();
    }

    /**
     * Dispatch modal event for viewing a report
     */
    public function viewRoadDefectReports($reportId): void
    {
        $this->dispatch('show-view-road-defect-reports-modal', reportId: $reportId);
    }

    /**
     * Reset pagination when filters or search change
     */
    public function updating($property): void
    {
        if (in_array($property, [
            'table_search',
            'statusFilter',
            'severityFilter',
            'barangayFilter',
            'selectedDefect',
            'locationFilter',
            'start_date',
            'end_date'
        ])) {
            $this->isSearching = true; // Track search state
            session()->put('hideSearchBar', true); // Ensure session is set
            $this->resetPage();
        }
    }


    /**
     * Toggle sorting order
     */
    public function toggleSorting(string $field): void
    {
        if ($this->sort_by === $field) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $field;
            $this->sort_direction = 'asc';
        }

        $this->resetPage();
    }

    /**
     * Reset search and filter values
     */
    public function resetFilterAndSearch(): void
    {
        $this->table_search = '';
        $this->statusFilter = '';
        $this->severityFilter = '';
        $this->barangayFilter = '';
        $this->selectedDefect = '';
        $this->locationFilter = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->sort_by = 'id';
        $this->sort_direction = 'asc';
        $this->resetPage();
    }


    /**
     * Query for Retrieving Road Defect Reports
     */
    public function getFilteredQuery()
    {
        $reportQuery = Report::query()->with('severity:id,label');

        // Search conditions
        if ($this->table_search) {
            $reportQuery->where(function ($query) {
                $query->where('id', 'like', "%{$this->table_search}%")
                    ->orWhere('defect', 'like', "%{$this->table_search}%")
                    ->orWhere('location', 'like', "%{$this->table_search}%")
                    ->orWhere('street', 'like', "%{$this->table_search}%")
                    ->orWhere('purok', 'like', "%{$this->table_search}%")
                    ->orWhere('barangay', 'like', "%{$this->table_search}%")
                    ->orWhere('date', 'like', "%{$this->table_search}%")
                    ->orWhereHas('severity', fn($subQuery) =>
                    $subQuery->where('label', 'like', "%{$this->table_search}%")
                    )
                    ->orWhere('status', 'like', "%{$this->table_search}%");
            });
        }

        // Filter conditions
        if ($this->statusFilter) {
            $reportQuery->where('status', $this->statusFilter);
        }

        if ($this->severityFilter) {
            $reportQuery->whereHas('severity', fn($query) =>
            $query->where('label', $this->severityFilter)
            );
        }

        if ($this->barangayFilter) {
            $reportQuery->where('barangay', $this->barangayFilter);
        }

        if ($this->selectedDefect) {
            $reportQuery->where('defect', $this->selectedDefect);
        }

        if ($this->locationFilter) {
            $reportQuery->whereRaw("CONCAT(street, ' ', purok) LIKE ?", ["%{$this->locationFilter}%"]);
        }

        // Date range filter logic
        if ($this->start_date && $this->end_date) {
            $reportQuery->whereBetween('date', [$this->start_date, $this->end_date]);
        } elseif ($this->start_date) {
            $reportQuery->whereDate('date', '>=', $this->start_date);
        } elseif ($this->end_date) {
            $reportQuery->whereDate('date', '<=', $this->end_date);
        }

        // Sorting logic
        if ($this->sort_by === 'severity.label') {
            $reportQuery->leftJoin('severities', 'reports.severity_id', '=', 'severities.id')
                ->select('reports.*', 'severities.label')
                ->orderBy('severities.label', $this->sort_direction);
        } else {
            $reportQuery->orderBy($this->sort_by, $this->sort_direction);
        }

        return $reportQuery;
    }

    /**
     * Export Road Defect Reports
     */
    public function exportRoadDefectReports(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filteredRoadDefectReports = $this->getFilteredQuery()->get();

        return Excel::download(new RoadDefectReportsExport($filteredRoadDefectReports), 'road_defect_reports.xlsx');
    }

    public function dehydrate(): void
    {
        if ($this->isSearching) {
            session()->put('hideSearchBar', true);
        } else {
            session()->forget('hideSearchBar');
        }

        $this->dispatch('refreshNavigation'); // Ensure UI updates
    }


    /**
     * Render Component
     */
    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        if (!$this->isSearching) {
            session()->forget('hideSearchBar');
        }

        $roadDefectReports = $this->getFilteredQuery()->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.road-defect-reports', [
            'roadDefectReports' => $roadDefectReports,
        ]);
    }
}
