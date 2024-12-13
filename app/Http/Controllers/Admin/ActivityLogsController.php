<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    public function __invoke()
    {
        return view('admin.pages.activity-logs');
    }
}
