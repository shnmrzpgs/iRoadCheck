<?php
use Illuminate\Support\Facades\Route;

# DIRE MO PAG ROUTE ##

Route::get('/', function () {
    return view('iroadcheck.prototype.Admin.Admin-Login');
});