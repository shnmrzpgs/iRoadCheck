<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuggestionReportsController extends Controller
{
    public function index()
    {
        return view('staff.pages.suggestion-reports');
    }
}
