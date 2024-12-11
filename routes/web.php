<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/prototype/prototype.php';

// Temp design only
require __DIR__ . '/admin/prototype.php';

// Working routes
require __DIR__ . '/admin/auth.php';
require __DIR__ . '/admin/web.php';

//Route:: get('/client/auth/sign-in', function () {
//    return view('prototype.client.enter-email');
//})->name('sign-in');
//
//Route::post(
//    RoutePath::for('client-email', '/client/auth/sign-in'),
//    [ClientAuth::class, 'EmailSubmit'])->name('client-email');


//practice
Route::get('/User/activity-logs', function () {
    return view('iroadcheck.prototype.User.activity-logs');
})->name('activity-logs');

Route::get('/search', function () {
    return view('components.search-bar');
})->name('search');

// admin Routes
Route::get('/admin/activity-logs', function () {
    return view('iroadcheck.prototype.Admin.activity-logs');
})->name('admin.activity-logs');
