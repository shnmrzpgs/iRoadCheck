<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportHistoryController extends Controller
{
    public function __invoke()
    {
        return view('staff.pages.report-history');
    }

}
