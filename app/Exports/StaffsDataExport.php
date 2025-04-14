<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\Models\Staff;
use App\Models\StaffRole;

class StaffsDataExport implements FromView, WithEvents, WithDrawings
{
    protected $staffs;
    protected $filters;

    public function __construct($staffs, array $filters = [])
    {
        $this->staffs = $staffs;
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

        // Add Staff Role filter info
        if (!empty($this->filters['staff_role_id'])) {
            $role = StaffRole::find($this->filters['staff_role_id']);
            if ($role) {
                $subtitle[] = "Staff Role: {$role->name}";
            }
        }

        // Add search term if present
        if (!empty($this->filters['search'])) {
            $subtitle[] = "Search: {$this->filters['search']}";
        }

        return $subtitle;
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
                $sheet->getColumnDimension('C')->setWidth(15);
                $sheet->getColumnDimension('D')->setWidth(25);
                $sheet->getColumnDimension('E')->setWidth(35);
                $sheet->getColumnDimension('F')->setWidth(35);
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


    public function view(): View
    {
        return view('exports.staffs', [
            'staffs' => $this->staffs,
            'subtitle' => $this->getSubtitle(),
        ]);
    }
}
