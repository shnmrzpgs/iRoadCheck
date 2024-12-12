<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function updateStatus(Request $request)
    {
        $request->validate([
            'newStatus' => 'required|string', // Example status options
            'reportId' => 'required|exists:reports,id', // Ensure the report exists
        ]);

        $report = Report::findOrFail($request->input('reportId'));
        $report->status = $request->input('newStatus');
        $report->save();
        // Redirect back with success message
        return redirect()->route('user.manage-tagging')
            ->with('message', 'Report status updated successfully!');
    }
}
