<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportHistoryController extends Controller
{
    public function index()
    {
        return view('staff.pages.report-history');
    }

}
