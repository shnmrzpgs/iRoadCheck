<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


//Route::get('report/{reportId}', [ReportController::class, 'show'])->name('report.show');
Route::put('report/update-status', [ReportController::class, 'updateStatus'])->name('update.report.status');

Route::get('/Staff/manage-tagging', [ReportController::class, 'updateStatus'])->name('Staff.manage-tagging');


Route::group(['middleware' => 'AuthStaff'], function () {

    Route::get('/staff/dashboard', App\Http\Controllers\staff\DashboardController::class)
        ->name('staff.dashboard');

    // Login route (make sure this is defined)
    Route::get('/Staff/login', [AuthController::class, 'showLoginForm'])->name('login');

});



