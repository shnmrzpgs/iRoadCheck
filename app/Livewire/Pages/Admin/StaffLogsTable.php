<?php

namespace App\Livewire\Pages\Admin;

use App\Exports\StaffLogsExport;
use App\Models\StaffLog;
use App\Models\User; // Add the Staff model (assuming this is the model for staff)
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
use Illuminate\Support\Facades\Crypt;

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
                        $staff_query->whereRaw("LOWER(CONVERT(AES_DECRYPT(users.first_name, 'your_secret_key') USING utf8mb4)) LIKE LOWER(?)", [$search])
                            ->orWhereRaw("LOWER(CONVERT(AES_DECRYPT(users.last_name, 'your_secret_key') USING utf8mb4)) LIKE LOWER(?)", [$search]);
                    });
            });
        }

        // Apply Sorting
        if ($this->sort_by) {
            if ($this->sort_by === 'staff.first_name' || $this->sort_by === 'staff.last_name') {
                $staff_logs_query
                    ->leftJoin('staffs', 'staff_logs.staff_id', '=', 'staffs.id')
                    ->leftJoin('users', 'staffs.user_id', '=', 'users.id')
                    ->orderByRaw("LOWER(CONVERT(AES_DECRYPT(users.{$this->sort_by}, 'your_secret_key') USING utf8mb4)) {$this->sort_direction}");
            } elseif ($this->sort_by === 'dateTime') {
                $staff_logs_query->orderBy('staff_logs.dateTime', $this->sort_direction);
            } else {
                $staff_logs_query->orderBy($this->sort_by, $this->sort_direction);
            }
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

    public function getDecryptedStaffLogs()
    {
        return $this->getFilteredQuery()->get()->map(function ($log) {
            if ($log->staff && $log->staff->user) {
                $log->staff->user->first_name = Crypt::decryptString($log->staff->user->first_name);
                $log->staff->user->last_name = Crypt::decryptString($log->staff->user->last_name);
            }
            return $log;
        });
    }
   
    public function render(): Factory|Application|View|\Illuminate\View\View
    {

        $staffLogs = $this->getFilteredQuery()
            ->paginate($this->rowsPerPage);

        session()->forget('hideSearchBar');
        return view('livewire.pages.admin.staff-logs-table', [
            'staffLogs' => $staffLogs,
            'staff_logs' => $this->getDecryptedStaffLogs(),
        ]);
    }
}
