<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Report;

class ReportHistoryController extends Controller
{

    public function index()
    {
        return view('resident.pages.report-history');
    }
}
