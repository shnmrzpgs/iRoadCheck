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
        $roleid = $staff->staffRolesPermissions->staffRole->id;
        $get = StaffRolesPermissions::where('staff_role_id', $roleid)->get();

        foreach ($get as $item) {
            if ($item->staff_permission_id == 3) {
                return view('staff.pages.road-defect-reports');
            }
            else{
                return view('staff.pages.report-history');
            }
        }
    }

}
