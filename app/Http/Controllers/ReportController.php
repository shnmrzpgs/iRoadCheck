<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function submitReport(Request $request)
    {
//        dd($request);
        // Save the data to the database
        // Extract the base64 data from the photo string
        $photoData = $request->photo;

        // Remove the base64 prefix (data:image/png;base64,)
        $photoData = str_replace('data:image/png;base64,', '', $photoData);

        // Decode the base64 data
        $image = base64_decode($photoData);

        // Generate a unique file name for the image
        $imageName = 'report_photo_' . time() . '.png';
        $formattedDate = Carbon::createFromFormat('F d, Y', $request->date)->format('Y-m-d');
        $formattedTime = Carbon::parse($request->time)->format('H:i:s');
        // Save the image to storage (e.g., storage/app/public/reports)
        $imagePath = Storage::disk('public')->put('reports/' . $imageName, $image);
        $path = "reports/".$imageName;  // This will return the full URL or relative path to the image

        $annotatedPath = 'reports/report_photo_' . time() . '_annotated.png';
        Report::create([
            'resident_id' => Auth::id(),
            'defect' => "Pothole",
            'lat' => $request->latitude,
            'lng' => $request->longitude,
            'location' => $request->address,
            'date' => $formattedDate,  // Store the formatted date
            'time' => $formattedTime,
            'severity' => 1,
            'image' => $path,
            'image_annotated' => $annotatedPath,
            'status' => "Unfixed"


        ]);
        session()->flash('message', 'Data saved successfully!');
        // Send a success message back to the frontend
//        $this->dispatchBrowserEvent('report-saved', ['message' => 'Report submitted successfully!']);
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
        $report->resident_id = Auth::id();
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
