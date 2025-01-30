<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;

Route::group(['middleware' => 'AuthAdmin'], function () {

    Route::get('/admin/dashboard', App\Http\Controllers\admin\DashboardController::class)
        ->name('admin.dashboard');

    Route::get('/admin/manage-users', App\Http\Controllers\admin\ManageUserController::class)
        ->name('admin.manage-users-table');

    Route::get('/admin/staff-role', App\Http\Controllers\admin\StaffRolesController::class)
        ->name('admin.staff-role-table');

    Route::get('/admin/admin-logs', App\Http\Controllers\admin\AdminLogsController::class)
        ->name('admin.admin-logs-table');

    Route::get('/admin/staff-logs', App\Http\Controllers\admin\StaffLogsController::class)
        ->name('admin.staff-logs-table');

    Route::get('/admin/resident-logs', App\Http\Controllers\admin\ResidentLogsController::class)
        ->name('admin.resident-logs-table');

    Route::get('/admin/system-logs', App\Http\Controllers\admin\SystemLogsController::class)
        ->name('admin.system-logs-table');

    Route::get('/admin/notifications', App\Http\Controllers\admin\NotificationsController::class)
        ->name('admin.notifications');

    Route::get('/admin/profile-edit', App\Http\Controllers\admin\ProfileController::class)
        ->name('admin.profile-edit');

    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');

    // Login route (make sure this is defined)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

});

