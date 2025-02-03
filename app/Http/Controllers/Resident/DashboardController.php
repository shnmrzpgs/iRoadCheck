<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve all reports by the user
        $reportsCount  = DB::table('reports')
            ->where('resident_id', $user->id)
            ->count();

        // Pass the count to the Blade view
        return view('iroadcheck.prototype.Residents.dashboard', compact('reportsCount'));
    }
}

