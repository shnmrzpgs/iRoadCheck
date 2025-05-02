<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StaffRolesPermissions;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $staff = Staff::where('user_id', $user->id)->first();
        $roleid = $staff->staffRolesPermissions->staffRole->id;
        $get = StaffRolesPermissions::where('staff_role_id', $roleid)->get();

        if ($get->staff_permission_id != 1 ) {
            dd('nope');
            return view('staff.pages.dashboard');
        }
    }
}
