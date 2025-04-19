<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class entercode extends Controller
{
    public function index(){
        return view('iroadcheck.prototype.residents.EnterCode');
    }
}
