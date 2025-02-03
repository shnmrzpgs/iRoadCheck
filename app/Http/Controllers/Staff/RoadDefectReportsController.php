<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoadDefectReportsController extends Controller
{
    public function __invoke()
    {
        return view('staff.pages.road-defect-reports');
    }

}
