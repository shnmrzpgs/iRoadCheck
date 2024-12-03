<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function showManageUser(){
        return view('iroadcheck.prototype.Admin.manage-users');
    }
}
