<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function __invoke()
    {
        return view('admin.pages.user-type');
    }
}
