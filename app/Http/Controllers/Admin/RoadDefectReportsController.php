<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoadDefectReportsController extends Controller
{
    public function __invoke()
    {
        return view('admin.pages.road-defect-reports');
    }
}
