<?php
use Illuminate\Support\Facades\Route;

# DIRE MO PAG ROUTE ##

Route::get('/', function () {
    return view('iroadcheck.prototype.Admin.login');
});

Route::get('/login', function () {
    return view('iroadcheck.prototype.Admin.login');
});


