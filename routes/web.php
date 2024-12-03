<?php


use App\Http\Controllers\ActivityLogsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserTypeController;
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

Route:: get('/admin/auth/sign-in', function () {
    return view('iroadcheck.prototype.Admin.login');
})->name('admin-sign-in-show');

Route::get(
    RoutePath::for('admin-logout', '/Admin/auth/logout'),
    [AuthController::class, 'Logout'])->name('admin-logout');

Route::post(
    RoutePath::for('admin-sign-in', '/admin/auth/sign-in'),
    [AuthController::class, 'AdminSignIn'])->name('admin-sign-in');

Route::group(['middleware' => 'AuthAdmin'], function () {

    Route::get(
        RoutePath::for('admin-dashboard', '/admin/dashboard'),
        [DashboardController::class, 'showDashboard'])->name('admin-dashboard');

    Route::get(
        RoutePath::for('admin-manage-user', '/admin/manage-user'),
        [ManageUserController::class, 'showManageUser'])->name('admin-manage-user');

    Route::get(
        RoutePath::for('admin-user-type', '/admin/user-type'),
        [UserTypeController::class, 'showUserType'])->name('admin-user-type');

    Route::get(
        RoutePath::for('admin-activity-logs', '/admin/activity-logs'),
        [ActivityLogsController::class, 'showActivityLogs'])->name('admin-activity-logs');

    Route::get(
        RoutePath::for('admin-notification', '/admin/notification'),
        [NotificationController::class, 'showNotification'])->name('admin-notification');

});



//practice
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
