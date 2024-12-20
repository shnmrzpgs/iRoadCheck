<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function showUserType(){
        return view('iroadcheck.prototype.Admin.user-role');
    }
}
