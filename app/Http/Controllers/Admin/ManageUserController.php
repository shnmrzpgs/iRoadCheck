<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function viewUser(){

    }
    public function __invoke()
    {
        return view('admin.pages.manage-users');
    }
}

