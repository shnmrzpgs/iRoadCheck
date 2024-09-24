<?php

use Illuminate\Support\Facades\Route;

Route::view('/prototype/Admin/admin-signup', 'iroadcheck.prototype.Admin.admin-signup');

//Admin
Route::view('/prototype/Admin/login', 'iroadcheck.prototype.Admin.login');

Route::view('/prototype/Admin/forgot-password-send-code', 'iroadcheck.prototype.Admin.forgot-password-send-code');
Route::view('/prototype/Admin/forgot-password-verify-otp', 'iroadcheck.prototype.Admin.forgot-password-verify-otp');
Route::view('/prototype/Admin/create-new-password', 'iroadcheck.prototype.Admin.create-new-password');

Route::view('/prototype/Admin/verify-account-send-code', 'iroadcheck.prototype.Admin.verify-account-send-code');
Route::view('/prototype/Admin/verify-account-verify-otp', 'iroadcheck.prototype.Admin.verify-account-verify-otp');

Route::view('/component/Admin/dashboard', 'iroadcheck.prototype.Admin.dashboard');
