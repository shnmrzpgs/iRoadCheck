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
    public function storeReport(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'defect_type' => 'required|string',
            'report_id' => 'required|string|unique:reports,report_id',
            'date_time' => 'required|date',
            'location' => 'required|string',
            'image' => 'required|image|max:2048', // Example validation
            'lat' => 'required', // Example validation
            'lng' => 'required', // Example validation
        ]);

        // Save the report data
        $report = new Report();
        $report->resident_id = \Auth::id();
        $report->defect = $validated['defect_type'];
        $report->report_id = $validated['report_id'];
        $report->date = $validated['date_time'];
        $report->severity = "1";
        $report->status = "Unfixed";
        $report->location = $validated['location'];
        $report->lat = $validated['lat'];
        $report->lng = $validated['lng'];

        // Save the image
        if ($request->hasFile('image')) {
            $report->image = $request->file('image')->store('uploads/defect-images', 'public');
        }

        $report->save();

        return redirect()->route('suggestion-reports')->with('success', 'Report submitted successfully!');
    }
}
