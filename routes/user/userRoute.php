<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

//Route::get('report/{reportId}', [ReportController::class, 'show'])->name('report.show');
Route::put('report/update-status', [ReportController::class, 'updateStatus'])->name('update.report.status');

Route::get('/User/manage-tagging', [ReportController::class, 'updateStatus'])->name('User.manage-tagging');




