<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;

Route::group(['middleware' => 'AuthAdmin'], function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/manage-users', [App\Http\Controllers\admin\ManageUserController::class, 'index'])
        ->name('admin.manage-users-table');

    Route::get('/admin/road-defect-reports/{report_id}', [App\Http\Controllers\admin\RoadDefectReportsController::class, 'show'])
        ->name('admin.road-defect-reports');

    Route::get('/admin/road-defect-reports', [App\Http\Controllers\admin\RoadDefectReportsController::class, 'index'])
        ->name('admin.road-defect-reports');

    Route::get('/admin/staff-roles', [App\Http\Controllers\admin\StaffRolesController::class, 'index'])
        ->name('admin.staff-roles-table');

    Route::get('/admin/admin-logs', [App\Http\Controllers\admin\AdminLogsController::class, 'index'])
        ->name('admin.admin-logs-table');

    Route::get('/admin/staff-logs', [App\Http\Controllers\admin\StaffLogsController::class, 'index'])
        ->name('admin.staff-logs-table');

    Route::get('/admin/resident-logs', [App\Http\Controllers\admin\ResidentLogsController::class, 'index'])
        ->name('admin.resident-logs-table');

    Route::get('/admin/system-logs', [App\Http\Controllers\admin\SystemLogsController::class, 'index'])
        ->name('admin.system-logs-table');

    Route::get('/admin/notifications', [App\Http\Controllers\admin\NotificationsController::class, 'index'])
        ->name('admin.notifications');

    Route::get('/admin/profile-edit', [App\Http\Controllers\admin\ProfileController::class, 'index'])
        ->name('admin.profile-edit');

    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');

    // Login route (make sure this is defined)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

});

