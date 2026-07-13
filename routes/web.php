<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apps/ticket-system', function () {
    return view('apps.ticket-system');
})->name('ticket-system');

Route::get('/apps/klinik-system', function () {
    return view('apps.klinik-system');
})->name('klinik-system');

Route::get('/apps/erpsekolah-system', function () {
    return view('apps.erpsekolah-system');
})->name('erpsekolah-system');
