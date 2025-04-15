<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoadDefectReportsController extends Controller
{
    public function index()
    {
        return view('staff.pages.road-defect-reports');
    }

}
