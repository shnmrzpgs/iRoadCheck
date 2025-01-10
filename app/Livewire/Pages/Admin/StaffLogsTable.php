<?php

namespace App\Livewire\Pages\Admin;

use App\Exports\StaffLogsExport;
use App\Models\StaffLog;
use App\Models\User; // Add the User model (assuming this is the model for staff)
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;

class StaffLogsTable extends Component
{
    use WithoutUrlPagination, WithPagination;

    // Search term
    public string $search = '';

    // Date Filter
    public string $date_range_filter = '';

    // Rows per page
    public int $rowsPerPage = 10;

    // Sorting
    public string $sort_by = 'log_id'; // Default sorting by primary key
    public string $sort_direction = 'asc'; // Default sorting direction

    /**
     * Export the filtered staff logs to an Excel file.
     */
    public function exportStaffLogs(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filteredStaffLogs = $this->getFilteredQuery()->get();

        return Excel::download(new StaffLogsExport($filteredStaffLogs), 'staff_logs_report.xlsx');
    }

    /**
     * Build the filtered query for staff logs.
     */
    public function getFilteredQuery(): Builder
    {
        $staff_logs_query = StaffLog::with(['staff'])->select('staff_logs.*');

        // Apply Date Range Filter
        if (!empty($this->date_range_filter)) {
            $date_range = explode(' to ', $this->date_range_filter);

            foreach ($date_range as $key => $date) {
                $date_range[$key] = date('Y-m-d', strtotime($date));
            }

            if (count($date_range) === 2) {
                $staff_logs_query->whereBetween('created_at', [
                    Carbon::parse($date_range[0])->startOfDay(),
                    Carbon::parse($date_range[1])->endOfDay(),
                ]);
            }
        }

        // Apply Search Filter
        if ($this->search) {
            $search = '%' . $this->search . '%';
            $staff_logs_query->where(function ($query) use ($search) {
                $query->where('action', 'like', $search)
                    ->orWhere('dateTime', 'like', $search)
                    ->orWhereHas('staff', function ($staff_query) use ($search) {
                        $staff_query->where('staff_id', 'like', $search) // Ensure 'staff_id' is the correct column
                        ->orWhere('first_name', 'like', $search)
                            ->orWhere('last_name', 'like', $search);
                    });
            });
        }

        // Apply Sorting
        if (Str::contains($this->sort_by, '.')) {
            // Handle sorting for nested relationships like 'staff.first_name'
            $relations = explode('.', $this->sort_by);
            $column = array_pop($relations); // Get the column name for sorting
            $previousTable = 'staff_logs';

            foreach ($relations as $relation) {
                $staff_logs_query->join($relation, $previousTable . '.' . Str::singular($relation) . '_id', '=', $relation . '.id');
                $previousTable = $relation;
            }

            // Apply sorting to the column of the last table in the relationship
            $staff_logs_query->orderBy($previousTable . '.' . $column, $this->sort_direction);
        } else {
            // For direct column sorting in 'staff_logs'
            $staff_logs_query->orderBy($this->sort_by, $this->sort_direction);
        }

        return $staff_logs_query;
    }

    /**
     * Toggle sorting by a column.
     */
    public function toggleSorting(string $field): void
    {
        if ($this->sort_by === $field) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $field;
            $this->sort_direction = 'asc';
        }
    }

    /**
     * Reset the search filter.
     */
    public function resetSearch(): void
    {
        $this->search = '';
        $this->date_range_filter = '';

        $this->resetPage();
    }

    /**
     * Reset all filters and search.
     */
    public function resetFiltersAndSearch(): void
    {
        $this->reset(['search', 'date_range_filter']);
        $this->resetPage();
    }

    /**
     * Reset pagination when rows per page are updated.
     */
    public function updatingRowsPerPage(): void
    {
        $this->resetPage();
    }

    /**
     * Render the Livewire component.
     */
    public function render(): Factory|Application|View|\Illuminate\View\View
    {

        $staffLogs = $this->getFilteredQuery()
            ->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.staff-logs-table', [
            'staffLogs' => $staffLogs,
        ]);
    }
}
