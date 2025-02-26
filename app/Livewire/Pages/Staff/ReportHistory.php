<?php

namespace App\Livewire\Pages\Staff;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use App\Models\Report;

class ReportHistory extends Component
{

    public $reports, $start_date, $end_date, $date_range_filter, $sort_by = 'id', $sort_direction = 'asc';

public function mount()
{
    $this->start_date = now()->subMonth()->format('Y-m-d');
    $this->end_date = now()->format('Y-m-d');
    $this->loadReports();
}

public function loadReports()
{
    $query = Report::query();

    // Apply date range filter
    if ($this->date_range_filter) {
        $dates = explode(' to ', $this->date_range_filter);
        if (count($dates) == 2) {
            $query->whereBetween('date', [$dates[0], $dates[1]]);
        }
    }

    // Sorting logic
    $query->orderBy($this->sort_by, $this->sort_direction);

    $this->reports = $query->get();
}

public function toggleSorting($column)
{
    if ($this->sort_by === $column) {
        $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
    } else {
        $this->sort_by = $column;
        $this->sort_direction = 'asc';
    }

    $this->loadReports();
}

public function resetFiltersAndSearch()
{
    $this->date_range_filter = null;
    $this->sort_by = 'id';
    $this->sort_direction = 'asc';
    $this->loadReports();
}

    public function render():  Factory|Application|View|\Illuminate\View\View
    {
        session()->forget('hideSearchBar');
        return view('livewire.pages.staff.report-history');
    }
}
