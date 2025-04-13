<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/prototype/prototype.php';

// Temp design only
require __DIR__ . '/admin/prototype.php';

// Working routes
require __DIR__ . '/admin/auth.php';
require __DIR__ . '/admin/web.php';

require __DIR__ . '/resident/residentRoute.php';

require __DIR__ . '/staff/auth.php';
require __DIR__ . '/staff/userRoute.php';

// Search Bar route
Route::get('/search', function () {
    return view('components.search-bar');
})->name('search');

Route::get('/data-privacy-statement', function () {
    return view('iroadcheck.prototype.data-privacy-statement');
})->name('data-privacy-statement');

Route::get('/landing-page', function () {
    return view('iroadcheck.prototype.landing-page');
})->name('landing-page');
