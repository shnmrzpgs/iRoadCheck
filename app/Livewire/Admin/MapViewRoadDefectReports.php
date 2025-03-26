<?php

namespace App\Livewire\Admin;

use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class MapViewRoadDefectReports extends Component
{
    public array $reports = [];
    public array $geoJsonData = [];
    public array $locations = [];
    public array $statuses = [];
    public array $defectTypes = [];
    public array $severities = [];

    protected $listeners = ['update-map-data' => 'updateMapData'];

    /**
     * Mount the component and load initial data.
     */
    public function mount(): void
    {
        // Load all reports with necessary fields
        $this->reports = Report::select([
            'id', 'reporter_id', 'defect', 'lat', 'lng', 'location',
            'date', 'time', 'label', 'image', 'image_annotated', 'status'
        ])->get()->toArray();

        // Load unique filtering options
        $this->locations = Report::pluck('location')->unique()->filter()->values()->toArray();
        $this->statuses = Report::pluck('status')->unique()->filter()->values()->toArray();
        $this->defectTypes = Report::pluck('defect')->unique()->filter()->values()->toArray();
        $this->severities = Report::pluck('label')->unique()->filter()->values()->toArray();

        // Load GeoJSON data if the file exists
        $path = public_path('geoJSON/tagumCityRoad.json');
        if (File::exists($path)) {
            $data = File::get($path);
            $this->geoJsonData = json_decode($data, true) ?? [];
        }
    }

    /**
     * Update the reports data dynamically when a filter is applied.
     *
     * @param array $data
     */
    public function updateMapData(array $data): void
    {
        $this->reports = $data['filteredData'] ?? [];
        $this->dispatch('updateMap', ['filteredData' => $this->reports]);
    }

    /**
     * Render the Livewire component view.
     *
     * @return Factory|Application|View|\Illuminate\View\View
     */
    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.admin.map-view-road-defect-reports', [
            'reports' => $this->reports,
            'geoJsonData' => $this->geoJsonData,
            'locations' => $this->locations,
            'statuses' => $this->statuses,
            'defectTypes' => $this->defectTypes,
            'severities' => $this->severities,
        ]);
    }
}
