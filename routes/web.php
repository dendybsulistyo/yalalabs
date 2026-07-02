<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apps/ticket-system', function () {
    return view('apps.ticket-system');
})->name('ticket-system');
