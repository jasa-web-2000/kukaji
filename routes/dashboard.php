<?php

use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\EventParticipantController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\LogoutController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ResetPasswordController;
use App\Http\Controllers\Dashboard\SpeakerController;
use App\Http\Controllers\Dashboard\ThemeController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::post('logout', [LogoutController::class, 'submit'])
        ->name('logout');

    Route::get('profile', [ProfileController::class, 'index'])
        ->name('profile.index');
    Route::post('profile', [ProfileController::class, 'submit'])
        ->name('profile.submit');

    Route::get('reset-password', [ResetPasswordController::class, 'index'])
        ->name('reset-password.index');
    Route::post('reset-password', [ResetPasswordController::class, 'submit'])
        ->name('reset-password.submit');

    Route::resource('user', UserController::class)
        ->except(['show'])
        ->middleware('role:admin');

    Route::resource('event', EventController::class)
        ->except(['show'])
        ->middleware('role:admin,eo');

    Route::resource('theme', ThemeController::class)
        ->except(['show'])
        ->middleware('role:admin');

    Route::resource('speaker', SpeakerController::class)
        ->except(['show'])
        ->middleware('role:admin');

    Route::resource('event-participant', EventParticipantController::class)->only(['index', 'store', 'destroy']);
});
