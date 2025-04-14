<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class AdminLogsExport implements FromView, WithEvents, WithDrawings
{

    protected $filteredAdminLogs;

    public function __construct($filteredAdminLogs)
    {
        $this->filteredAdminLogs = $filteredAdminLogs;
    }


    /**
     * Register events to style the export.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Apply "Old English Text MT" font style to the title
                $sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 20,
                    ],
                ]);

                // Center align the title text
                $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');

                // Set column widths for better readability
                $sheet->getColumnDimension('A')->setWidth(10);
                $sheet->getColumnDimension('B')->setWidth(18);
                $sheet->getColumnDimension('C')->setWidth(20);
                $sheet->getColumnDimension('D')->setWidth(25);
                $sheet->getColumnDimension('D')->setWidth(25);
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
        $drawing->setPath(public_path('storage/images/tagum_city_logo.png')); // Adjust the path to your logo image
        $drawing->setHeight(110); // Set the height of the logo
        $drawing->setCoordinates('B1');
        $drawing->setOffsetX(5);
        $drawing->setOffsetY(100);

        return [$drawing];
    }


    /**
     * Generate the view for the export.
     */
    public function view(): View
    {
        return view('exports.admin_logs', [
            'adminLogs' => $this->filteredAdminLogs
        ]);
    }
}
