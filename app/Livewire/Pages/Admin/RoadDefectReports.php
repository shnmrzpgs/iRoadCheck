<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RoadDefectReports extends Component
{
    use WithoutUrlPagination, WithPagination;

    public string $search = '';
    public string $sortBy = 'date';
    public string $sortDirection = 'desc';
    public int $rowsPerPage = 10;
    public array $geoJsonData = [];
    public $reports = [];

    protected $queryString = ['search', 'sortBy', 'sortDirection'];

    /**
     * Load the GeoJSON data when the component is mounted.
     */
    public function mount(): void
    {
        $this->reports = Report::all();

        $path = public_path('geoJSON/tagumCityRoad.json');

        if (File::exists($path)) {
            $this->geoJsonData = json_decode(File::get($path), true);
        }
    }

    /**
     * Fetch reports with search, sorting, and pagination.
     */
    public function getFilteredReports(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Report::query();

        // Apply Search Filter
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            $query->where('description', 'like', $searchTerm)
                ->orWhere('location', 'like', $searchTerm);
        }

        return $query->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->rowsPerPage);
    }

    /**
     * Toggle sorting column and direction.
     */
    public function toggleSorting(string $column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    /**
     * Reset search and filters.
     */
    public function resetFilters(): void
    {
        $this->reset(['search']);
        $this->resetPage();
    }

    /**
     * Render Livewire Component.
     */
    public function render(): View
    {
        return view('livewire.pages.admin.road-defect-reports', [
            'roadDefectReports' => $this->getFilteredReports(),
            'geoJsonData' => $this->geoJsonData
        ]);
    }
}
