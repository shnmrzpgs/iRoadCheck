<?php

use Illuminate\Support\Facades\Route;

//Route::view('/prototype/admin/admin-signup', 'iroadcheck.prototype.admin.admin-signup');

Route::view('/prototype/landing-page', 'iroadcheck.prototype.landing-page');
Route::view('/prototype/email-message', 'iroadcheck.prototype.email-message');

Route::view('/prototype/admin/login', 'iroadcheck.prototype.Admin.login');
Route::view('/prototype/admin/forgot-password-send-code', 'iroadcheck.prototype.Admin.forgot-password-send-code');
Route::view('/prototype/admin/forgot-password-verify-otp', 'iroadcheck.prototype.Admin.forgot-password-verify-otp');
Route::view('/prototype/admin/create-new-password', 'iroadcheck.prototype.Admin.create-new-password');
Route::view('/prototype/admin/verify-account-send-code', 'iroadcheck.prototype.Admin.verify-account-send-code');
Route::view('/prototype/admin/verify-account-verify-otp', 'iroadcheck.prototype.Admin.verify-account-verify-otp');

//admin
Route::view('/component/admin/dashboard', 'iroadcheck.prototype.Admin.dashboard')->name('admin.dashboard');
Route::view('/component/admin/manage-users', 'iroadcheck.prototype.Admin.manage-users')->name('admin.manage-users');
Route::view('/component/admin/user-type', 'iroadcheck.prototype.Admin.user-type')->name('admin.user-type');
Route::view('/component/admin/activity-logs', 'iroadcheck.prototype.Admin.activity-logs')->name('admin.activity-logs');
Route::view('/component/admin/notifications', 'iroadcheck.prototype.Admin.notifications')->name('admin.notifications');
Route::view('/component/admin/profile-settings', 'iroadcheck.prototype.Admin.profile-settings')->name('admin.profile-settings');

//user
Route::view('/component/user/dashboard', 'iroadcheck.prototype.User.dashboard')->name('user.dashboard');
Route::view('/component/user/manage-tagging', 'iroadcheck.prototype.User.manage-tagging')->name('user.manage-tagging');
Route::view('/component/user/reports', 'iroadcheck.prototype.User.reports')->name('user.reports');
Route::view('/component/user/activity-logs', 'iroadcheck.prototype.User.activity-logs')->name('user.activity-logs');
Route::view('/component/user/profile-settings', 'iroadcheck.prototype.User.profile-settings')->name('user.profile-settings');
Route::view('/component/user/notifications', 'iroadcheck.prototype.User.notifications')->name('user.notifications');
Route::view('/component/user/report-road-issue', 'iroadcheck.prototype.User.report-road-issue')->name('user.report-road-issue');

//Residents
Route::view('/prototype/residents/login', 'iroadcheck.prototype.Residents.login')->name('residents-login');
Route::view('/prototype/residents/forgotPassword', 'iroadcheck.prototype.Residents.forgotPassword')->name('forgotPassword');
Route::view('/prototype/residents/EnterCode', 'iroadcheck.prototype.Residents.EnterCode')->name('EnterCode');
Route::view('/prototype/residents/createNewPass', 'iroadcheck.prototype.Residents.createNewPass')->name('createNewPass');
Route::view('/prototype/residents/signup', 'iroadcheck.prototype.Residents.signup')->name('signup');
Route::view('/prototype/residents/signup-createPass', 'iroadcheck.prototype.Residents.signup-createPass')->name('signup-createPass');
Route::view('/prototype/residents/verify-user', 'iroadcheck.prototype.Residents.verify-user')->name('verify-user');
Route::view('/prototype/residents/verify-user-enterCode', 'iroadcheck.prototype.Residents.verify-user-enterCode')->name('verify-user-enterCode');
Route::view('/prototype/residents/dashboard', 'iroadcheck.prototype.Residents.dashboard')->name('dashboard');
Route::view('/prototype/residents/report-road-issues', 'iroadcheck.prototype.Residents.report-road-issues')->name('report-road-issues');
Route::view('/prototype/residents/suggestion-reports', 'iroadcheck.prototype.Residents.suggestion-reports')->name('suggestion-reports');
Route::view('/prototype/residents/report-history', 'iroadcheck.prototype.Residents.report-history')->name('report-history');
Route::view('/prototype/residents/profile-info', 'iroadcheck.prototype.Residents.profile-info')->name('profile-info');
Route::view('/prototype/residents/profile-contact-info', 'iroadcheck.prototype.Residents.profile-contact-info')->name('profile-contact-info');
Route::view('/prototype/residents/profile-changePass', 'iroadcheck.prototype.Residents.profile-changePass')->name('profile-changePass');
Route::view('/prototype/residents/notifications', 'iroadcheck.prototype.Residents.notifications')->name('notifications');

//practice
Route::view('/prototype/residents/camera-practice', 'iroadcheck.prototype.Residents.camera-practice');
Route::view('/component/admin/practice', 'iroadcheck.prototype.Admin.practice');


