<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatenewPass extends Controller
{
    public function index(){
        return view('iroadcheck.prototype.residents.createNewPass');
    }
}
