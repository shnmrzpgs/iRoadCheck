<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StaffRolesPermissions;
use Illuminate\Http\Request;

class RoadDefectReportsController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $staff = Staff::where('user_id', $user->id)->first();
        $roleId = $staff?->staff_role ?? null;
        $hasPermission = false;

        if ($roleId) {
            $hasPermissionDashboard = StaffRolesPermissions::where('staff_role_id', $roleId)
                ->where('staff_permission_id', 3)
                ->exists();
            if($hasPermissionDashboard){
                return view('staff.pages.road-defect-reports');
            }
        }

// If no permission_id === 3 was found
        return redirect()->route('staff.report-history');

    }

}
