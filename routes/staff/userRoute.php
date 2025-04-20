<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Livewire\ManageTagging;
use App\Livewire\ReportsMap;
use Illuminate\Support\Facades\Route;


//Route::get('report/{reportId}', [ReportController::class, 'show'])->name('report.show');
Route::put('report/update-status', [ReportController::class, 'updateStatus'])->name('update.report.status');

Route::get('/Staff/manage-tagging', [ReportController::class, 'updateStatus'])->name('Staff.manage-tagging');

Route::group(['middleware' => 'AuthStaff'], function () {

    Route::get('/staff/dashboard', [App\Http\Controllers\staff\DashboardController::class, 'index'])
        ->name('staff.dashboard');

    Route::get('/staff/manage-tagging', [App\Http\Controllers\ReportController::class, 'manageTagging'])
        ->name('staff.manage-tagging');

    Route::get('/staff/road-defect-reports', [App\Http\Controllers\staff\RoadDefectReportsController::class, 'index'])
        ->name('staff.road-defect-reports');

    Route::get('/staff/capture-road-defect', [App\Http\Controllers\ReportController::class, 'captureRoadDefect'])
        ->name('staff.capture-road-defect');

    Route::post('/staff/temporary-update', [App\Http\Controllers\ReportController::class, 'TempUpdate'])
        ->name('staff.temporary-update');

//    Route::get('staff/manage-map', ReportsMap::class)->name('manage.tagging');

//    Route::get('/staff/suggestion-reports', [App\Http\Controllers\staff\SuggestionReportsController::class, 'index'])
//        ->name('staff.suggestion-reports');

    Route::get('/staff/update-history', [App\Http\Controllers\staff\ReportHistoryController::class, 'index'])
        ->name('staff.report-history');

    Route::get('/staff/notifications', [App\Http\Controllers\staff\NotificationsController::class, 'index'])
        ->name('staff.notifications');

    Route::get('/staff/profile-edit', [App\Http\Controllers\staff\ProfileController::class, 'index'])
        ->name('staff.profile-edit');

    Route::post('/logoutStaff', [AuthController::class, 'LogoutStaff'])->name('logoutStaff');

    // Login route (make sure this is defined)
    Route::get('/login', [AuthController::class, 'showLoginFormStaff'])->name('login');

});



