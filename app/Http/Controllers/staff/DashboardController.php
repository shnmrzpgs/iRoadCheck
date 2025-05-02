<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $staff = Staff::where('user_id', $user->id)->first();
        $roleid = $staff->staffRolesPermissions->staffRole->id;
        if ($roleid ) {
            dd($roleid);
            return view('staff.pages.dashboard');
        }
    }
}
