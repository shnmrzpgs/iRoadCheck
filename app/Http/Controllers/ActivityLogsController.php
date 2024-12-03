<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    public function showActivityLogs(){
        return view('iroadcheck.prototype.Admin.activity-logs');
    }
}
