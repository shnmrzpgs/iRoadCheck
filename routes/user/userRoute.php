<?php


use App\Http\Controllers\ReportController;

//Route::get('report/{reportId}', [ReportController::class, 'show'])->name('report.show');
Route::put('report/update-status', [ReportController::class, 'updateStatus'])->name('update.report.status');

