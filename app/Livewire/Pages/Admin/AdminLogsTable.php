<?php

namespace App\Livewire\Pages\Admin;

use App\Models\ActivityLog;
use App\Models\AdminLog;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AdminLogsTable extends Component
{
    use WithPagination; use WithoutUrlPagination;

    // Search term
    public string $search = '';

    // Rows per page
    public int $rowsPerPage = 10;

    // Sorting
    public string $sort_by = 'id';
    public string $sort_direction = 'asc';

    public function mount(): void
    {
        // No need to fetch logs in mount, pagination will handle that
    }

    public function toggleSorting(string $field): void
    {
        // Toggle sorting direction
        if ($this->sort_by === $field) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $field;
            $this->sort_direction = 'asc';
        }
    }

    public function resetSearch(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    public function updatingRowsPerPage(): void
    {
        // Reset pagination when rows per page is updated
        $this->resetPage();
    }

//    public function getFilteredQuery(): Builder
//    {
//        $admin_logs_query = AdminLogsTable::with([
//
//        ])
//            ->select('admin_logs.*');
//
////        // Apply Action Filter
////        if (! empty($this->action_filter)) {
////            $admin_logs_query->where('action', $this->action_filter);
////        }
//
//
//        if (! empty($this->date_range_filter)) {
//            // Sample Single: 2021/01/01
//            // Sample Multiple: '2021/01/01 to 2021/12/31'
//
//            $date_range = explode(' to ', $this->date_range_filter);
//
//            foreach ($date_range as $key => $date) {
//                $date_range[$key] = date('Y-m-d', strtotime($date));
//            }
//
//            if (count($date_range) === 2) {
//                $admin_logs_query->whereBetween('date', [
//                    Carbon::parse($date_range[0])->startOfDay(),
//                    Carbon::parse($date_range[1])->endOfDay(),
//                ]);
//            }
//        }
//
//        if ($this->search) {
//            $search = '%' . $this->search . '%';
//            $admin_logs_query->where(function ($query) use ($search) {
//                $query->where('action', 'like', $search)
//                    ->orWhere('description', 'like', $search)
//                    ->orWhere('date', 'like', $search)
//                    ->orWhereHas('admin', function ($admin_query) use ($search) {
//                        $admin_query->where('id_number', 'like', $search)
//                            ->orWhere('first_name', 'like', $search)
//                            ->orWhere('last_name', 'like', $search);
//                    });
//            });
//        }
//
//        if ($this->sort_by === 'role') {
//            $admin_logs_query->join('model_has_roles', 'admin_logs.user_id', '=', 'model_has_roles.model_id')
//                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
//                ->orderBy('roles.name', $this->sort_direction);
//        } elseif (substr_count($this->sort_by, '.') === 1) {
//            [$relation, $column] = explode('.', $this->sort_by);
//            $admin_logs_query->join($relation, 'admin_logs.'.Str::singular($relation).'_id', '=', $relation.'.id')
//                ->orderBy($relation.'.'.$column, $this->sort_direction);
//        } elseif (substr_count($this->sort_by, '.') > 1) {
//            $parts = explode('.', $this->sort_by);
//            $column = array_pop($parts);
//            $relations = $parts;
//
//            $previousTable = 'admin_logs';
//            foreach ($relations as $currentTable) {
//                $admin_logs_query->join($currentTable, $previousTable.'.'.Str::singular($currentTable).'_id', '=', $currentTable.'.id');
//                $previousTable = $currentTable;
//            }
//            $admin_logs_query->orderBy($previousTable.'.'.$column, $this->sort_direction);
//        } else {
//            $admin_logs_query->orderBy($this->sort_by, $this->sort_direction);
//        }
//        return $admin_logs_query;
//
//    }

//    public function getDistinctActions()
//    {
//        return AdminLog::select('action')
//            ->distinct()
//            ->orderBy('action', 'asc')
//            ->pluck('action');
//    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        // Query to filter and paginate
        $activities = ActivityLog::query()
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('transaction_id', 'like', '%' . $this->search . '%')
                        ->orWhere('type', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.admin-logs-table', [
            'activities' => $activities,  // Pass the activities to the view
        ]);
//        $admin_logs = $this->getFilteredQuery()->paginate($this->rows_per_page);
//        $actions = $this->getDistinctActions();
//
//        return view('livewire.pages.admin.admin-logs-table', [
////            'admin_logs' => $admin_logs,
//            'actions' => $actions, // Pass the actions to the view
//        ]);
    }
}
