<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
//    public function updateStatus(Request $request)
//    {
//        // Validate the Request Data
//        $request->validate([
//            'newStatus' => 'required|string', // Example status options
//            'reportId' => 'required|exists:reports,id', // Ensure the report exists
//        ]);
//
//        //Fetch the Report from the Database
//        $report = Report::findOrFail($request->input('reportId'));
//
//        // Store the previous status before updating
//        $previousStatus = $report->status;
//
//        //Update the Report's Status
//        $report->status = $request->input('newStatus');
//        $report->save();
//
//        //Reporter Data ex. reporter_id, name, user type, role-if exist or not,
//        // Get the authenticated staff details
//        $staff = auth()->user()->staff; // Assuming `auth()->user()->staff` fetches the staff model
//        $staffName = $staff->username ?? 'Unknown staff';
//        $staffRole = $staff->staffRolesPermissions->role_name ?? 'Unknown Role'; // Adjust based on your relationships
//
//        // Create a notification for the admin
//        $adminUserId = 1; // Replace with logic to dynamically fetch the admin user(s)
//        Notification::create([
//            'admin_user_id' => $adminUserId,
//            'report_id' => $report->id,
//            'title' => 'Report Status Updated',
//            'message' => "Report '{$report->defect}' at '{$report->location}' was updated from '{$previousStatus}' to '{$report->status}' by staff: {$staffName} ({$staffRole}).",
//            'is_read' => false,
//        ]);
//
//        // Redirect back with success message
//        return redirect()->route('Staff.manage-tagging')
//            ->with('message', 'Report status updated successfully!');
//    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'newStatus' => 'required|string',
            'reportId' => 'required|exists:reports,id',
        ]);

        $report = Report::findOrFail($request->input('reportId'));
        $previousStatus = $report->status;

        $report->status = $request->input('newStatus');
        $report->save();

        // Identify the staff who performed the update
        $staff = Staff::where('user_id', auth()->id())->with('staffRolesPermissions.staffRole')->first();

        $staffFullName = optional($staff->user)->first_name . ' ' . optional($staff->user)->last_name ?? 'Unknown Staff';

        // Get the staff role name
        $staffRole = optional($staff->staffRolesPermissions->staffRole)->name ?? 'Unknown Role';


        // Notify the first admin (type = 1)
        $admin = User::where('user_type', 1)->first();  // Assuming type 1 = Admin

        if ($admin) {
            Notification::create([
                'notifiable_id' => $admin->id,
                'notifiable_type' => User::class,
                'report_id' => $report->id,
                'title' => 'Report Status Updated',
                'message' => "The report '{$report->defect}' has been updated from '{$previousStatus}' to '{$report->status}' by Staff {$staffFullName} ({$staffRole}).",
                'is_read' => false,
            ]);
        }

        return redirect()->route('Staff.manage-tagging')
            ->with('message', 'Report status updated successfully!');
    }


//    public function submitReport(Request $request)
//    {
////        dd($request);
//        // Save the data to the database
//        // Extract the base64 data from the photo string
//        $photoData = $request->photo;
//
//        // Remove the base64 prefix (data:image/png;base64,)
//        $photoData = str_replace('data:image/png;base64,', '', $photoData);
//
//        // Decode the base64 data
//        $image = base64_decode($photoData);
//
//        // Generate a unique file name for the image
//        $imageName = 'report_photo_' . time() . '.png';
//        $formattedDate = Carbon::createFromFormat('F d, Y', $request->date)->format('Y-m-d');
//        $formattedTime = Carbon::parse($request->time)->format('H:i:s');
//        // Save the image to storage (e.g., storage/app/public/reports)
//        $imagePath = Storage::disk('public')->put('reports/' . $imageName, $image);
//        $path = "reports/".$imageName;  // This will return the full URL or relative path to the image
//
//        $annotatedPath = 'reports/report_photo_' . time() . '_annotated.jpg';
//        Report::create([
//            'reporter_id' => Auth::id(),
//            'defect' => "Pothole",
//            'lat' => $request->latitude,
//            'lng' => $request->longitude,
//            'location' => $request->address,
//            'date' => $formattedDate,  // Store the formatted date
//            'time' => $formattedTime,
//            'severity' => 1,
//            'image' => $path,
//            'image_annotated' => $annotatedPath,
//            'status' => "Unfixed"
//
//
//        ]);
//
//        return redirect()->route('report-road-issue')->with('success', true);
//        // Send a success message back to the frontend
////        $this->dispatchBrowserEvent('report-saved', ['message' => 'Report submitted successfully!']);
//    }

    public function submitReport(Request $request)
    {
        try {
            // ✅ Validate and decode base64 photo data
            if (!$request->has('photo') || !str_contains($request->photo, 'data:image/png;base64,')) {
                throw new \Exception('Invalid or missing image format.');
            }

            $image = base64_decode(str_replace('data:image/png;base64,', '', $request->photo));
            if (!$image) {
                throw new \Exception('Image decoding failed.');
            }

            // ✅ Generate unique file names for the image
            $timestamp = now()->timestamp;
            $imageName = "report_photo_{$timestamp}.png";
            $annotatedPath = "reports/report_photo_{$timestamp}_annotated.jpg";

            // ✅ Date/Time formatting with fallback
            $formattedDate = Carbon::parse($request->date)->format('Y-m-d') ?? now()->format('Y-m-d');
            $formattedTime = Carbon::parse($request->time)->format('H:i:s') ?? now()->format('H:i:s');

            // ✅ Save the image to storage
            $path = "reports/{$imageName}";
            Storage::disk('public')->put($path, $image);

            // ✅ Create the report entry
            $report = Report::create([
                'reporter_id' => Auth::id(),
                'defect' => "Pothole",
                'lat' => $request->latitude,
                'lng' => $request->longitude,
                'location' => $request->address,
                'date' => $formattedDate,
                'time' => $formattedTime,
                'label' => 1,
                'image' => $path,
                'image_annotated' => $annotatedPath,
                'status' => "Unfixed"
            ]);

            // ✅ Reporter Data
            $reporter = Auth::user();

            // ✅ Fetch Admins
            $admins = User::where('user_type', 1)->get();

            // ✅ Fetch Staff excluding those who are Admins
            $staff = Staff::with('user')->whereDoesntHave('user', function ($query) {
                $query->where('user_type', 1);
            })->get();

            if ($admins->isEmpty() && $staff->isEmpty()) {
                throw new \Exception('No admins or staff found.');
            }

            // ✅ Combine Admins and Staff, excluding the reporter
            $usersToNotify = $admins->merge($staff)->where('id', '!=', $reporter->id)->unique('id');

            // ✅ Notification Data
            $notificationData = [
                'report_id' => $report->id,
                'title' => 'Report Created',
                'message' => "A new report has been submitted by {$reporter->name} at {$request->address}.",
                'is_read' => false,
            ];

            // ✅ Notify Users
            $this->notifyUsers($usersToNotify, $notificationData, User::class);

            // ✅ Reporter Notification
            Notification::create([
                'report_id' => $report->id,
                'title' => 'Report Submitted',
                'message' => "You submitted a new road issue successfully at {$request->address}.",
                'notifiable_id' => $reporter->id,
                'notifiable_type' => User::class,
                'is_read' => false,
            ]);

            // ✅ Success feedback
            session()->flash('feedback', 'Report submitted successfully!');
            session()->flash('feedback_type', 'success');

            return redirect()->route('report-road-issue');

        } catch (\Exception $e) {
            // ✅ Enhanced error logging for precise debugging
            Log::error('Report Submission Error: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'admin_count' => User::where('user_type', 1)->count(),
                'staff_count' => Staff::count(),
            ]);

            // ✅ Error feedback
            session()->flash('feedback', 'Something went wrong while submitting the report. Please try again.');
            session()->flash('feedback_type', 'error');

            return redirect()->route('report-road-issue');
        }
    }

    /**
     * ✅ Helper function to notify users (Admins or Staff)
     */
    private function notifyUsers($users, $notificationData, $notifiableType)
    {
        foreach ($users as $user) {
            Notification::create(array_merge($notificationData, [
                'notifiable_id' => $user->id ?? $user->user_id,
                'notifiable_type' => $notifiableType,
            ]));
        }
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
        $report->reporter_id = Auth::id();
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

    public function manageTagging()
    {
        return view('iroadcheck.prototype.Staff.manage-tagging');
    }

    public function captureRoadDefect()
    {
        return view('iroadcheck.prototype.Staff.report-road-issue');
    }


}
