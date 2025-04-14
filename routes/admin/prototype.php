<?php

use Illuminate\Support\Facades\Route;

//Route::view('/prototype/admin/admin-signup', 'iroadcheck.prototype.admin.admin-signup');

Route::view('/prototype/data-privacy-act', 'iroadcheck.prototype.data-privacy-act')->name('admin.data-privacy-act');
Route::view('/prototype/landing-page', 'iroadcheck.prototype.landing-page')->name('admin.landing-page');
Route::view('/prototype/email-message', 'iroadcheck.prototype.email-message');

Route::view('/prototype/admin/login', 'iroadcheck.prototype.Admin.login')->name('admin.login');
Route::view('/prototype/admin/forgot-password-send-code', 'iroadcheck.prototype.Admin.forgot-password-send-code')->name('admin.forgot-password-send-code');
Route::view('/prototype/admin/forgot-password-verify-otp', 'iroadcheck.prototype.Admin.forgot-password-verify-otp')->name('admin.forgot-password-verify-otp');
Route::view('/prototype/admin/create-new-password', 'iroadcheck.prototype.Admin.create-new-password')->name('admin.create-new-password');
Route::view('/prototype/admin/verify-account-send-code', 'iroadcheck.prototype.Admin.verify-account-send-code')->name('admin.verify-account-send-code');
Route::view('/prototype/admin/verify-account-verify-otp', 'iroadcheck.prototype.Admin.verify-account-verify-otp')->name('admin.verify-account-verify-otp');

//admin
//Route::view('/component/admin/dashboard', 'iroadcheck.prototype.Admin.dashboard')->name('admin.dashboard');
Route::view('/component/admin/manage-users', 'iroadcheck.prototype.Admin.manage-users')->name('admin.manage-users');
Route::view('/component/admin/user-role', 'iroadcheck.prototype.Admin.user-role')->name('admin.user-role');
Route::view('/component/admin/activity-logs', 'iroadcheck.prototype.Admin.activity-logs')->name('admin.activity-logs');
//Route::view('/component/admin/notifications', 'iroadcheck.prototype.Admin.notifications')->name('admin.notifications');
Route::view('/component/admin/profile-settings', 'iroadcheck.prototype.Admin.profile-settings')->name('admin.profile-settings');

//Staff
Route::view('/component/Staff/dashboard', 'iroadcheck.prototype.Staff.dashboard')->name('Staff.dashboard');
Route::view('staff/manage-tagging', 'iroadcheck.prototype.Staff.manage-tagging')->name('Staff.manage-tagging');
Route::view('/component/Staff/reports', 'iroadcheck.prototype.Staff.reports')->name('Staff.reports');
Route::view('/component/Staff/profile-settings', 'iroadcheck.prototype.Staff.profile-settings')->name('Staff.profile-settings');
Route::view('/component/Staff/notifications', 'iroadcheck.prototype.Staff.notifications')->name('Staff.notifications');
Route::view('/component/Staff/report-road-issue', 'iroadcheck.prototype.Staff.update-road-issue')->name('Staff.report-road-issue');
Route::view('/component/Staff/suggestion-reports', 'iroadcheck.prototype.Staff.suggestion-reports')->name('Staff.suggestion-reports');
Route::view('/component/Staff/report-history', 'iroadcheck.prototype.Staff.report-history')->name('Staff.report-history');

//Residents
//Route::view('/prototype/residents/login', 'iroadcheck.prototype.Residents.login')->name('residents-login');
Route::view('/prototype/residents/forgotPassword', 'iroadcheck.prototype.Residents.forgotPassword')->name('forgotPassword');
Route::view('/prototype/residents/EnterCode', 'iroadcheck.prototype.Residents.EnterCode')->name('EnterCode');
Route::view('/prototype/residents/createNewPass', 'iroadcheck.prototype.Residents.createNewPass')->name('createNewPass');
//Route::view('/prototype/residents/signup', 'iroadcheck.prototype.Residents.signup')->name('signup');
Route::view('/prototype/residents/verify-user', 'iroadcheck.prototype.Residents.verify-user')->name('verify-user');

Route::view('/prototype/residents/dashboard', 'iroadcheck.prototype.Residents.dashboard')->name('dashboard');
//Route::view('/prototype/residents/report-road-issue', 'iroadcheck.prototype.Residents.report-road-issue')->name('report-road-issue');

Route::view('/prototype/residents/report-history', 'iroadcheck.prototype.Residents.report-history')->name('report-history');
Route::view('/prototype/residents/profile-info', 'iroadcheck.prototype.Residents.profile-info')->name('profile-info');
Route::view('/prototype/residents/notifications', 'iroadcheck.prototype.Residents.notifications')->name('notifications');

//resident scratch
Route::view('/prototype/residents/report-road-issue-step2', 'iroadcheck.prototype.Residents.report-road-issue-step2')->name('report-road-issue-step2');
Route::view('/prototype/residents/report-road-issue-step3', 'iroadcheck.prototype.Residents.report-road-issue-step3')->name('report-road-issue-step3');
Route::view('/prototype/residents/report-road-issues', 'iroadcheck.prototype.Residents.report-road-issues')->name('report-road-issues');
Route::view('/prototype/residents/profile-contact-info', 'iroadcheck.prototype.Residents.profile-contact-info')->name('profile-contact-info');
Route::view('/prototype/residents/profile-changePass', 'iroadcheck.prototype.Residents.profile-changePass')->name('profile-changePass');
Route::view('/prototype/residents/signup-createPass', 'iroadcheck.prototype.Residents.signup-createPass')->name('signup-createPass');

//practice
Route::view('/prototype/residents/camera-practice', 'iroadcheck.prototype.Residents.camera-practice');
Route::view('/component/admin/practice', 'iroadcheck.prototype.Admin.practice');
Route::view('/prototype/residents/blah', 'iroadcheck.prototype.Residents.blah');


