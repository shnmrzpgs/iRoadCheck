<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Report;

class ReportHistoryController extends Controller
{
    public function showReportHistory()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        // Fetch all reports
        $user = Auth::user();
        $reports = DB::table('reports')
            ->where('resident_id', $user->id)
            ->select('id', 'defect', 'location', 'status', 'date')
            ->get();


        return view('iroadcheck.prototype.Residents.report-history', compact('reports'));
    }
}
