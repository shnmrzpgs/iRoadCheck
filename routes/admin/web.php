<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;

Route::group(['middleware' => 'AuthAdmin'], function () {

//    Route::get(
//        RoutePath::for('admin-dashboard', '/admin/dashboard'),
//        [DashboardController::class, 'showDashboard'])->name('admin-dashboard');
//
//    Route::get(
//        RoutePath::for('admin-manage-user', '/admin/manage-user'),
//        [ManageUserController::class, 'showManageUser'])->name('admin-manage-user');

    Route::get('/admin/dashboard', App\Http\Controllers\admin\DashboardController::class)
        ->name('admin.dashboard');

    Route::get('/admin/manage-users', App\Http\Controllers\admin\ManageUserController::class)
        ->name('admin.manage-users-table');

//    Route::get(
//        RoutePath::for('admin-user-type', '/admin/user-type'),
//        [UserTypeController::class, 'showUserType'])->name('admin-user-type');
//
//    Route::get(
//        RoutePath::for('admin-activity-logs', '/admin/activity-logs'),
//        [ActivityLogsController::class, 'showActivityLogs'])->name('admin-activity-logs');
//
//    Route::get(
//        RoutePath::for('admin-notification', '/admin/notification'),
//        [NotificationController::class, 'showNotification'])->name('admin-notification');

});

