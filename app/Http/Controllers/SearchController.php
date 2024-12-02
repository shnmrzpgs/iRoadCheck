<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        // Implement your search logic here
        return view('components.search-bar', compact('query'));
    }
}
