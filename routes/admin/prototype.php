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

//User
Route::view('/component/User/dashboard', 'iroadcheck.prototype.User.dashboard')->name('User.dashboard');
Route::view('/component/User/manage-tagging', 'iroadcheck.prototype.User.manage-tagging')->name('User.manage-tagging');
Route::view('/component/User/reports', 'iroadcheck.prototype.User.reports')->name('User.reports');
Route::view('/component/User/activity-logs', 'iroadcheck.prototype.User.activity-logs')->name('User.activity-logs');
Route::view('/component/User/profile-settings', 'iroadcheck.prototype.User.profile-settings')->name('User.profile-settings');
Route::view('/component/User/notifications', 'iroadcheck.prototype.User.notifications')->name('User.notifications');
Route::view('/component/admin/practice', 'iroadcheck.prototype.Admin.practice');

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
Route::view('/prototype/residents/report-road-issue-step1', 'iroadcheck.prototype.Residents.report-road-issue-step1')->name('report-road-issue-step1');
Route::view('/prototype/residents/report-road-issue-step2', 'iroadcheck.prototype.Residents.report-road-issue-step2')->name('report-road-issue-step2');
Route::view('/prototype/residents/report-road-issue-step3', 'iroadcheck.prototype.Residents.report-road-issue-step3')->name('report-road-issue-step3');
Route::view('/prototype/residents/suggestion-reports', 'iroadcheck.prototype.Residents.suggestion-reports')->name('suggestion-reports');
Route::view('/prototype/residents/report-history', 'iroadcheck.prototype.Residents.report-history')->name('report-history');
Route::view('/prototype/residents/profile-info', 'iroadcheck.prototype.Residents.profile-info')->name('profile-info');
Route::view('/prototype/residents/profile-contact-info', 'iroadcheck.prototype.Residents.profile-contact-info')->name('profile-contact-info');
Route::view('/prototype/residents/profile-changePass', 'iroadcheck.prototype.Residents.profile-changePass')->name('profile-changePass');
Route::view('/prototype/residents/notifications', 'iroadcheck.prototype.Residents.notifications')->name('notifications');

//practice
Route::view('/prototype/residents/camera-practice', 'iroadcheck.prototype.Residents.camera-practice');

