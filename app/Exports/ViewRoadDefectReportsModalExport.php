<?php

namespace App\Exports;

use App\Models\Report;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ViewRoadDefectReportsModalExport implements FromView, WithDrawings
{
    protected $report;

    public function __construct($report)
    {
        $this->report = $report;
    }

    /**
     * Drawing images for the Excel sheet.
     */

    public function drawings(): array
    {
        $drawings = [];

        // Tagum City Logo
        $drawing1 = new Drawing();
        $drawing1->setName('Tagum City Logo');
        $drawing1->setDescription('City of Tagum Logo');
        $drawing1->setPath(public_path('storage/images/tagum_city_logo.png'));
        $drawing1->setHeight(125); // Set the height of the logo
        $drawing1->setCoordinates('B1');
        $drawing1->setOffsetX(5);
        $drawing1->setOffsetY(100);
        $drawings[] = $drawing1;

        // Reported Road Defect Image
        if (!empty($this->report->image)) {
            $drawing2 = new Drawing();
            $drawing2->setName('Reported Defect Image');
            $drawing2->setDescription('Reported Road Defect');
            $drawing2->setPath(public_path('storage/' . $this->report->image));
            $drawing2->setHeight(310);
            $drawing2->setCoordinates('B17');
            $drawing1->setOffsetX(10);
            $drawing1->setOffsetY(140);
            $drawings[] = $drawing2;
        }
//
//        // Updated Road Defect Image
//        if (!empty($this->report->updated_image)) {
//            $drawing3 = new Drawing();
//            $drawing3->setName('Updated Defect Image');
//            $drawing3->setDescription('Updated Road Defect');
//            $drawing3->setPath(public_path('storage/' . $this->report->updated_image));
//            $drawing3->setHeight(100);
//            $drawing3->setCoordinates('D12');
//            $drawings[] = $drawing3;
//        }

        return $drawings;
    }


    /**
     * Excel Export View.
     */
    public function view(): View
    {
        return view('exports.excel_export_view_road_defect_reports_modal', [
            'report' => $this->report
        ]);
    }

}
