<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard()
{
    // Ensure user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    $user = Auth::user();

    // Retrieve all reports by the authenticated user
    $reports = DB::table('reports')
        ->where('resident_id', $user->id)
        ->select('id', 'defect as defectType', 'location', 'status', 'date')
        ->get();

    $reportsCount = $reports->count();

    return view('iroadcheck.prototype.Residents.dashboard', compact('reports', 'reportsCount'));
}
}



