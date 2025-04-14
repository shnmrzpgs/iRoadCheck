<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;
use Illuminate\Cache\RateLimiting\Limit;


Route:: get('/staff/login', function () {
    return view('iroadcheck.prototype.Staff.login');
})->name('staff-sign-in-show');

Route::get(
    RoutePath::for('staff-logout', '/staff/auth/logout'),
    [AuthController::class, 'LogoutStaff'])->name('staff-logout');

Route::post(
    RoutePath::for('staff-sign-in', '/staff/auth/sign-in'),
    [AuthController::class, 'StaffSignIn'])->name('staff-sign-in');

// Apply it in your route
Route::post('/iroadcheck.prototype.Staff.login', [AuthController::class, 'login'])
    ->middleware('throttle:staff-login')
    ->name('iroadcheck.prototype.Staff.login');


Route::get('/iroadcheck.prototype.Staff.change-password', [AuthController::class, 'showChangePasswordForm'])->name('staff.password.change');
Route::post('/iroadcheck.prototype.Staff.change-password', [AuthController::class, 'changePassword'])->name('staff.password.update');

