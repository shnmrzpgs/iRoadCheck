<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuggestionReportsController extends Controller
{
    public function __invoke()
    {
        return view('staff.pages.suggestion-reports');
    }
}
