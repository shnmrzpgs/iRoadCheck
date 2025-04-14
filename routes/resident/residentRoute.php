<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Resident\DashboardController;
use App\Http\Controllers\Resident\ResidentAuth;
use App\Http\Controllers\Resident\ReportHistoryController as ReportHistory;

use App\Http\Controllers\SMSController;
use App\Livewire\ResidentLogin;
use Illuminate\Support\Facades\Route;


Route::get('/resident/install', function () {
    return view('livewire.resident-install');
})->middleware('PwaRedirect');

Route::view('/resident/login', ['iroadcheck.prototype.residents.login'])->name('residents-login');
Route::post('resident/register', [ResidentAuth::class, 'signup'])->name('resident-register');
Route::view('/prototype/residents/signup', ['iroadcheck.prototype.residents.signup'])->name('signup');

Route::post('/logoutResident', [AuthController::class, 'LogoutResident'])->name('logoutResident');

Route::group(['middleware' => 'VerifyResident'], function () {
    Route::view('resident/verify-code', ['iroadcheck.prototype.residents.verify-user-enterCode'])->name('verify-code');
    Route::post('resident/code-verify', [ResidentAuth::class, 'verifyCode'])->name('verifyCode');

});
Route::group(['middleware' => ['AuthResident']], function () {

//    Route::post('resident/submit-report', [ReportController::class, 'storeReport'])->name('submit-report');
    Route::post('/submit-report', [ReportController::class, 'submitReport'])->name('submit.report');
    Route::post('/submit-temp-report', [ReportController::class, 'TempSubmitReport'])->name('temp.submit.report');
    Route::view('/residents/report-road-issue', ['iroadcheck.prototype.residents.report-road-issue'])->name('report-road-issue');
    Route::view('/residents/review-report', ['iroadcheck.prototype.residents.review-report'])->name('review-report');
    Route::get('/send-sms', [SMSController::class, 'sendSMS']);

    Route::get('/resident/dashboard', [App\Http\Controllers\resident\DashboardController::class, 'index'])
    ->name('resident.dashboard');
Route::view('/residents/suggestion-reports', 'iroadcheck.prototype.residents.suggestion-reports')->name('suggestion-reports');
    Route::get('/resident/report-history', [App\Http\Controllers\resident\ReportHistoryController::class, 'index'])
    ->name('resident.report-history');

    Route::get('/resident/profile-edit', [App\Http\Controllers\resident\ProfileController::class, 'index'])
    ->name('resident.profile-edit');

    Route::get('/resident/notifications', [App\Http\Controllers\resident\NotificationController::class, 'index'])
        ->name('resident.notifications');
});

