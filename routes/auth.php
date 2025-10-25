<?php

use App\Http\Controllers\Landing\LoginController;
use App\Http\Controllers\Landing\SignupController;
use Illuminate\Support\Facades\Route;


Route::prefix('/login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('landing.login');
    Route::post('/', [LoginController::class, 'submit'])
        ->middleware('throttle:5,30')
        ->name('landing.login.submit');
});

Route::prefix('/signup')->group(function () {
    Route::get('/', [SignupController::class, 'index'])->name('landing.signup');
    Route::post('/', [SignupController::class, 'submit'])
        ->middleware('throttle:5,30')
        ->name('landing.signup.submit');
});
