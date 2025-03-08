<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\Models\Report;

class HistoryReportExport implements FromView, WithEvents, WithDrawings
{
    protected $reports;
    protected $filters;

    public function __construct($reports, array $filters = [])
    {
        $this->reports = $reports;
        $this->filters = $filters;
    }

    private function getSubtitle(): array
    {
        $subtitle = [];

        // Add Status filter info
        if (!empty($this->filters['status'])) {
            $status = ucfirst($this->filters['status']);
            $subtitle[] = "Status: {$status}";
        }

        // Add defect filter info
        if (!empty($this->filters['defect'])) {
            $defect = ucfirst($this->filters['defect']);
            $subtitle[] = "Defect: {$defect}";
        }

          // Add location filter info
          if (!empty($this->filters['barangay'])) {
            $barangay = ucfirst($this->filters['barangay']);
            $subtitle[] = "Barangay: {$barangay}";
        }

        // Add search term if present
        if (!empty($this->filters['search'])) {
            $subtitle[] = "Search: {$this->filters['search']}";
        }
        
        return $subtitle;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Set the print area
                $sheet->getPageSetup()->setPrintArea('A1:E' . ($this->reports->count() + 10));

                // Apply styles to the header
                $sheet->getStyle('A1:E7')->getAlignment()->setHorizontal('center');
                
                // Style for the title
                $sheet->getStyle('A9')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                ]);

                // Style for the table headers
                $headerRow = 13; // Adjust based on your template
                $sheet->getStyle("A{$headerRow}:E{$headerRow}")->applyFromArray([
                    'font' => ['bold' => true],
                   
                    
                ]);

                // Set column widths
                $sheet->getColumnDimension('A')->setWidth(8);  // No.
                $sheet->getColumnDimension('B')->setWidth(20); // defect
                $sheet->getColumnDimension('C')->setWidth(50); // location
                $sheet->getColumnDimension('D')->setWidth(25); // date
                $sheet->getColumnDimension('E')->setWidth(15); // Status

                // Auto-height for all rows
                $sheet->getDefaultRowDimension()->setRowHeight(-1);
            },
        ];
    }

    public function drawings(): array
    {
        $drawings = [];

        // Left Logo
        $leftDrawing = new Drawing();
        $leftDrawing->setName('Left Logo');
        $leftDrawing->setDescription('Left Logo');
        $leftDrawing->setPath(public_path('storage/images/tagum_city_logo.png')); // Update path if necessary
        $leftDrawing->setHeight(100); // Adjust height as needed
        $leftDrawing->setCoordinates('B2'); // Starting cell
        $leftDrawing->setOffsetX(5); // Fine-tune horizontal positioning
        $leftDrawing->setOffsetY(5); // Fine-tune vertical positioning

        // Right Logo
        $rightDrawing = new Drawing();
        $rightDrawing->setName('Right Logo');
        $rightDrawing->setDescription('Right Logo');
        $rightDrawing->setPath(public_path('storage/images/IRoadCheck_Logo.png')); // Update path if necessary
        $rightDrawing->setHeight(100); // Adjust height as needed
        $rightDrawing->setCoordinates('D2'); // Starting cell for the right logo
        $rightDrawing->setOffsetX(5); // Fine-tune horizontal positioning
        $rightDrawing->setOffsetY(5); // Fine-tune vertical positioning

        $drawings[] = $leftDrawing;
        $drawings[] = $rightDrawing;

        return $drawings;
    }

    public function view(): View
    {
        return view('exports.reports-history', [
            'reports' => $this->reports,
            'subtitle' => $this->getSubtitle(),
        ]);

    }
}
