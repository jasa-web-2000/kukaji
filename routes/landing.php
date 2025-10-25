<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing.index', [
        'page' => 'Beranda',
        'title' => 'Beranda Title',
        'desc' => 'Beranda Desc',
    ]);
})->name('landing.index');

Route::get('/arsip', function () {
    return view('pages.landing.event', [
        'page' => 'Arsip',
        'title' => 'Arsip Title',
        'desc' => 'Arsip Desc',
    ]);
})->name('landing.event');
