<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffRolesController extends Controller
{
    public function __invoke()
    {
        return view('admin.pages.staff-roles');
    }
}
