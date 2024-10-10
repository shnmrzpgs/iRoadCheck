<?php

use Illuminate\Support\Facades\Route;

Route::view('/prototype/admin/admin-signup', 'iroadcheck.prototype.Admin.admin-signup');

//Admin
Route::view('/prototype/Admin/login', 'iroadcheck.prototype.Admin.login');

Route::view('/prototype/admin/forgot-password-send-code', 'iroadcheck.prototype.Admin.forgot-password-send-code');
Route::view('/prototype/admin/forgot-password-verify-otp', 'iroadcheck.prototype.Admin.forgot-password-verify-otp');
Route::view('/prototype/admin/create-new-password', 'iroadcheck.prototype.Admin.create-new-password');

Route::view('/prototype/admin/verify-account-send-code', 'iroadcheck.prototype.Admin.verify-account-send-code');
Route::view('/prototype/admin/verify-account-verify-otp', 'iroadcheck.prototype.Admin.verify-account-verify-otp');

Route::view('/component/admin/dashboard', 'iroadcheck.prototype.Admin.dashboard');
Route::view('/component/admin/manage-users', 'iroadcheck.prototype.Admin.manage-users');
Route::view('/component/admin/user-type', 'iroadcheck.prototype.Admin.user-type');
Route::view('/component/admin/activity-logs', 'iroadcheck.prototype.Admin.activity-logs');
Route::view('/component/admin/notifications', 'iroadcheck.prototype.Admin.notifications');
