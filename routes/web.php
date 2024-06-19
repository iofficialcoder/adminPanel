<?php

// use App\Http\Controllers\Auth\TwoStepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset-password');

Route::get('/new-password', function () {
    return view('auth.new-password');
})->name('new-password');

Route::get('/two-steps', function () {
    return view('auth.two-steps');
})->name('two-steps');

Route::get('/overview', function () {
    return view('pages.accounts.overview');
})->name('overview');

Route::get('/setting', function () {
    return view('pages.accounts.setting');
})->name('setting');


// Authentication Routes
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes
// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// // Password Reset Routes
// Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// // New Password Routes


// // Two-Step Authentication Routes
// Route::get('/two-step', [TwoStepController::class, 'showTwoStepForm'])->name('two-step.form');
// Route::post('/two-step', [TwoStepController::class, 'verifyTwoStep'])->name('two-step.verify');