<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        return view('iroadcheck.prototype.User.activity-logs');
    }
}
