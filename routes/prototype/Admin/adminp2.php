<?php

use Illuminate\Support\Facades\Route;

Route::view('/prototype/admin/admin-signup', 'iroadcheck.prototype.Admin.admin-signup');

//Admin
Route::view('/prototype/admin/login', 'iroadcheck.prototype.Admin.login');

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



//Residents
Route::view('/prototype/residents/login', 'iroadcheck.prototype.Residents.login');
Route::view('/prototype/residents/forgotPassword', 'iroadcheck.prototype.Residents.forgotPassword')->name('forgotPassword');
Route::view('/prototype/residents/EnterCode', 'iroadcheck.prototype.Residents.EnterCode')->name('EnterCode');
Route::view('/prototype/residents/createNewPass', 'iroadcheck.prototype.Residents.createNewPass')->name('createNewPass');
Route::view('/prototype/residents/signup', 'iroadcheck.prototype.Residents.signup')->name('signup');
Route::view('/prototype/residents/signup-createPass', 'iroadcheck.prototype.Residents.signup-createPass')->name('signup-createPass');
Route::view('/prototype/residents/verify-user', 'iroadcheck.prototype.Residents.verify-user')->name('verify-user');
Route::view('/prototype/residents/verify-user-enterCode', 'iroadcheck.prototype.Residents.verify-user-enterCode')->name('verify-user-enterCode');
Route::view('/prototype/residents/dashboard', 'iroadcheck.prototype.Residents.dashboard')->name('dashboard');
Route::view('/prototype/residents/report-road-issue-step1', 'iroadcheck.prototype.Residents.report-road-issue-step1')->name('report-road-issue-step1');
Route::view('/prototype/residents/report-road-issue-step2', 'iroadcheck.prototype.Residents.report-road-issue-step2')->name('report-road-issue-step2');

