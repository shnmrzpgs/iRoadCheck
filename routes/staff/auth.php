<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;

Route:: get('/staff/login', function () {
    return view('iroadcheck.prototype.Staff.login');
})->name('staff-sign-in-show');

Route::get(
    RoutePath::for('staff-logout', '/staff/auth/logout'),
    [AuthController::class, 'LogoutStaff'])->name('staff-logout');

Route::post(
    RoutePath::for('staff-sign-in', '/staff/auth/sign-in'),
    [AuthController::class, 'StaffSignIn'])->name('staff-sign-in');
