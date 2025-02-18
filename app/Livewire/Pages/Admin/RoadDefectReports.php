<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Notification;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class RoadDefectReports extends Component
{
    use WithPagination;

    public $sortBy = 'date';
    public $sortDirection = 'desc';

    protected $queryString = ['sortBy', 'sortDirection'];

    /**
     * Toggle sorting column and direction.
     */
    public function toggleSorting($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    /**
     * Fetch reports with sorting and pagination.
     */
    public function getReports()
    {
        return Report::orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
    }


    /**
     * Render Livewire Component.
     */
    public function render(): View
    {
        return view('livewire.pages.admin.road-defect-reports', [
            'roadDefectReports' => $this->getReports(),
        ]);
    }
}
