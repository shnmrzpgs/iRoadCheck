<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Resident\DashboardController;
use App\Http\Controllers\Resident\ResidentAuth;
use App\Http\Controllers\Resident\ReportHistoryController as ReportHistory;

use App\Http\Controllers\SMSController;
use App\Livewire\ResidentLogin;
use Illuminate\Support\Facades\Route;



Route::view('/resident/login', 'iroadcheck.prototype.Residents.login')->name('residents-login');
Route::post('resident/register', [ResidentAuth::class, 'signup'])->name('resident-register');


Route::group(['middleware' => 'VerifyResident'], function () {
    Route::view('resident/verify-code', 'iroadcheck.prototype.Residents.verify-user-enterCode')->name('verify-code');
    Route::post('resident/code-verify', [ResidentAuth::class, 'verifyCode'])->name('verifyCode');

});
Route::group(['middleware' => 'AuthResident'], function () {
    Route::get('/resident/dashboard', [DashboardController::class, 'showDashboard'])->name('residents-dashboard');
    Route::get('/prototype/residents/report-history', [ReportHistory::class, 'showReportHistory'])->name('report-history');
//    Route::post('resident/submit-report', [ReportController::class, 'storeReport'])->name('submit-report');
    Route::post('/submit-report', [ReportController::class, 'submitReport'])->name('submit.report');
    Route::view('/prototype/residents/report-road-issue', 'iroadcheck.prototype.Residents.report-road-issue')->name('report-road-issue');
    Route::get('/send-sms', [SMSController::class, 'sendSMS']);
});

