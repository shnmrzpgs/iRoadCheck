<?php
use Illuminate\Support\Facades\Route;

# DIRE MO PAG ROUTE ##

Route::get('/', function () {
    return redirect('/resident/install');
});


Route::get('/login', function () {
    return view(['iroadcheck.prototype.Admin.login']);
});


