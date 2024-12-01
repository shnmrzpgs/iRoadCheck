<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;


require __DIR__ . '/prototype/prototype.php';
require __DIR__ . '/prototype/admin/adminp2.php';


//Route:: get('/client/auth/sign-in', function () {
//    return view('prototype.client.enter-email');
//})->name('sign-in');
//
//Route::post(
//    RoutePath::for('client-email', '/client/auth/sign-in'),
//    [ClientAuth::class, 'EmailSubmit'])->name('client-email');

Route:: get('/Admin/auth/sign-in', function () {
    return view('iroadcheck.prototype.Admin.login');
})->name('sign-in');

Route::post(
    RoutePath::for('Admin-sign-in', '/Admin/auth/sign-in'),
    [AuthController::class, 'AdminSignIn'])->name('Admin-sign-in');

Route::group(['middleware' => 'auth'], function () {
    Route:: get('/Admin/dashboard', function () {
        return view('iroadcheck.prototype.Admin.dashboard');
    })->name('Admin-dashboard');
    Route::get(
        RoutePath::for('Admin-logout', '/Admin/auth/logout'),
        [AuthController::class, 'Logout'])->name('Admin-logout');

});

//practice
Route::get('User/dashboard', function () {
    return view('iroadcheck.prototype.User.dashboard');
})->name('dashboard');

Route::get('/User/activity-logs', function () {
    return view('iroadcheck.prototype.User.activity-logs');
})->name('activity-logs');

Route::get('/search', function () {
    return view('components.search-bar');
})->name('search');

// Admin Routes

Route::get('/Admin/activity-logs', function () {
    return view('iroadcheck.prototype.Admin.activity-logs');
})->name('admin.activity-logs');
