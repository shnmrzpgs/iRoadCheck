<?php

use Illuminate\Support\Facades\Route;

Route::view('/prototype/Admin/admin-signup', 'iroadcheck.prototype.Admin.admin-signup');

//Admin
Route::view('/prototype/Admin/login', 'iroadcheck.prototype.Admin.login');
Route::view('/prototype/Admin/forgot-password-send-code', 'iroadcheck.prototype.Admin.forgot-password-send-code');
