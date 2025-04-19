<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentLogsController extends Controller
{
    public function index()
    {
        return view('admin.pages.resident-logs');
    }
}
