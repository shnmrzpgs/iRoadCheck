<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ResidentLogsExport implements FromView, WithEvents, WithDrawings
{
    protected $filteredResidentLogs;

    public function __construct($filteredResidentLogs)
    {
        $this->filteredResidentLogs = $filteredResidentLogs;
    }

    /**
     * Register events to style the export.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Apply font style to the title
                $sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 20,
                    ],
                ]);

                // Center align the title text
                $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center');

                // Set column widths for better readability
                $sheet->getColumnDimension('A')->setWidth(15);
                $sheet->getColumnDimension('B')->setWidth(20);
                $sheet->getColumnDimension('C')->setWidth(30);
                $sheet->getColumnDimension('D')->setWidth(25);
                $sheet->getColumnDimension('E')->setWidth(25);
            }
        ];
    }

    /**
     * Add a logo image to the sheet.
     * @throws Exception
     */
    public function drawings(): array
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('System Logo');
        $drawing->setPath(public_path('storage/images/IRoadCheck_Logo.png')); // Adjust the path to your logo image
        $drawing->setHeight(80); // Set the height of the logo
        $drawing->setCoordinates('A1');
        $drawing->setOffsetX(25);
        $drawing->setOffsetY(100);

        return [$drawing];
    }

    /**
     * Generate the view for the export.
     */
    public function view(): View
    {
        return view('exports.resident_logs', [
            'residentLogs' => $this->filteredResidentLogs
        ]);
    }
}
