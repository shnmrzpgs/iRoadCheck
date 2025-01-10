<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function viewUser(){

    }
    public function __invoke()
    {
        // $users = User::with('userRole')->get();

        // return view('admin.pages.manage-users', compact('users', ));
        return view('admin.pages.manage-users');
    }
}

