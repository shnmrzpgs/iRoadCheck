<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemLogsController extends Controller
{
    public function index()
    {
        return view('admin.pages.system-logs');
    }
}
