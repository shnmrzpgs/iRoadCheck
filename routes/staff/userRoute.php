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

    Route::get('/staff/manage-tagging', [App\Http\Controllers\ReportController::class, 'manageTagging'])
        ->name('staff.manage-tagging');

    Route::get('/staff/road-defect-reports', App\Http\Controllers\staff\RoadDefectReportsController::class)
        ->name('staff.road-defect-reports');

    Route::get('/staff/capture-road-defect', [App\Http\Controllers\ReportController::class, 'captureRoadDefect'])
        ->name('staff.capture-road-defect');

    Route::get('/staff/suggestion-reports', App\Http\Controllers\staff\SuggestionReportsController::class)
        ->name('staff.suggestion-reports');

    Route::get('/staff/report-history', App\Http\Controllers\staff\ReportHistoryController::class)
        ->name('staff.report-history');

    // Login route (make sure this is defined)
    Route::get('/Staff/login', [AuthController::class, 'showLoginForm'])->name('login');

});



