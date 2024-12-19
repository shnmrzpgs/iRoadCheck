<?php

use App\Livewire\ResidentLogin;
use Illuminate\Support\Facades\Route;



Route::view('/resident/login', 'iroadcheck.prototype.Residents.login')->name('residents-login');
Route::group(['middleware' => 'AuthResident'], function () {
    Route::view('/resident/dashboard', 'iroadcheck.prototype.Residents.dashboard')->name('residents-dashboard');

});

