<?php

use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orion', function () {
    return view('orion');
})->name('orion');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,10')
    ->name('contact.store');

Route::get('/apps/ticket-system', function () {
    return view('apps.ticket-system');
})->name('ticket-system');

Route::get('/apps/klinik-system', function () {
    return view('apps.klinik-system');
})->name('klinik-system');


Route::get('/apps/klinikgigi-system', function () {
    return view('apps.klinikgigi-system');
})->name('klinikgigi-system');



Route::get('/apps/erpsekolah-system', function () {
    return view('apps.erpsekolah-system');
})->name('erpsekolah-system');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.attempt');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contact-submissions', [ContactSubmissionController::class, 'index'])->name('contact-submissions.index');
    Route::patch('/contact-submissions/{contactSubmission}/status', [ContactSubmissionController::class, 'updateStatus'])->name('contact-submissions.update-status');
});
