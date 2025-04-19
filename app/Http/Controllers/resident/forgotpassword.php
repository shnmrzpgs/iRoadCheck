<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;

class forgotpassword extends Controller
{
    public function index(){
        return view('iroadcheck.prototype.residents.forgotPassword');
    }
}
