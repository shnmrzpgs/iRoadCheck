<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;

Route:: get('/admin/login', function () {
    return view('iroadcheck.prototype.Admin.login');
})->name('admin-sign-in-show');

Route::get(
    RoutePath::for('admin-logout', '/admin/auth/logout'),
    [AuthController::class, 'Logout'])->name('admin-logout');

Route::post(
    RoutePath::for('admin-sign-in', '/admin/auth/sign-in'),
    [AuthController::class, 'AdminSignIn'])->name('admin-sign-in');
