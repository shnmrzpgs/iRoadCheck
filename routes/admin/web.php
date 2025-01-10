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

//    Route::get(
//        RoutePath::for('admin-user-type', '/admin/user-type'),
//        [UserRoleController::class, 'showUserType'])->name('admin-user-type');
//
//    Route::get(
//        RoutePath::for('admin-activity-logs', '/admin/activity-logs'),
//        [AuditLogsController::class, 'showActivityLogs'])->name('admin-activity-logs');
//
//    Route::get(
//        RoutePath::for('admin-notification', '/admin/notification'),
//        [NotificationController::class, 'showNotification'])->name('admin-notification');

    Route::get('/admin/dashboard', App\Http\Controllers\admin\DashboardController::class)
        ->name('admin.dashboard');

    Route::get('/admin/manage-users', App\Http\Controllers\admin\ManageUserController::class)
        ->name('admin.manage-users-table');

    Route::get('/admin/staff-role', App\Http\Controllers\admin\StaffRoleController::class)
        ->name('admin.staff-role-table');

    Route::get('/admin/admin-logs', App\Http\Controllers\admin\AdminLogsController::class)
        ->name('admin.admin-logs-table');

    Route::get('/admin/staff-logs', App\Http\Controllers\admin\StaffLogsController::class)
        ->name('admin.staff-logs-table');

    Route::get('/admin/resident-logs', App\Http\Controllers\admin\ResidentLogsController::class)
        ->name('admin.resident-logs-table');

    Route::get('/admin/system-logs', App\Http\Controllers\admin\SystemLogsController::class)
        ->name('admin.system-logs-table');

    Route::get('/admin/user-role', App\Http\Controllers\admin\UserRoleController::class)
        ->name('admin.user-role-table');

    Route::get('/admin/activity-logs', App\Http\Controllers\admin\AuditLogsController::class)
        ->name('admin.activity-logs-table');

});

