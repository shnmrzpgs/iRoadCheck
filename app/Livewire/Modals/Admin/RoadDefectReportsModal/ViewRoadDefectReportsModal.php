<?php

namespace App\Livewire\Modals\Admin\RoadDefectReportsModal;

use App\Exports\ViewRoadDefectReportsModalExport;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ViewRoadDefectReportsModal extends Component
{
    #[Modelable]
    public ?Report $report = null; // Report data
    public $image; // Road defect image
    public $reportId; // Public property for Livewire data binding

    public string $identifier = ''; // Unique identifier for modal control
    public $showModal = false; // Modal visibility control

    protected $listeners = ['show-view-road-defect-reports-modal' => 'showModal'];

    /**
     * Initialize the component and set a unique identifier
     */
    public function mount(): void
    {
        $this->identifier = uniqid();

        if ($this->reportId) {
            $this->report = Report::find($this->reportId);
            if ($this->report) {
                $this->image = asset('storage/' . $this->report->image);
            }
        }
    }

    /**
     * Show the modal with the selected report data
     */
    #[On('show-view-road-defect-reports-modal')]
    public function showModal($reportId): void
    {
        $this->report = Report::find($reportId);

        if (!$this->report) {
            Log::error('Report not found', ['reportId' => $reportId]);
            return;
        }

        $this->image = asset('storage/' . $this->report->image);

        $this->dispatch('view-road-defect-reports-modal-shown');
    }

    /**
     * Export View Road Defect Reports Modal
     */
    public function exportToExcel()
    {
        if (!$this->report) {
            return;
        }

        $reportId = $this->report->id ?? 'Unknown_Report';

        $this->dispatch('export-to-excel-finished');

        return Excel::download(
            new ViewRoadDefectReportsModalExport($this->report),
            "ReportID_{$reportId}_Road_Defect_Reports.xlsx"
        );
    }

    public function exportToPDF()
    {
        if (!$this->report) {
            return;
        }

        $reportId = $this->report->id ?? 'Unknown_Report';

        $this->dispatch('export-to-pdf-finished');

        $pdf = PDF::loadView(
            'exports.view_road_defect_reports_modal.pdf_export_view_road_defect_reports_modal',
            ['report' => $this->report]
        );

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, "ReportID_{$reportId}_Road_Defect_Reports.pdf");
    }

    /**
     * Render the view
     */
    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.modals.admin.road-defect-reports-modal.view-road-defect-reports-modal');
    }

}
