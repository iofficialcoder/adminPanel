<?php

// use App\Http\Controllers\Auth\TwoStepController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name('login.provider');
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('home');
//     })->name('home');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/', function () {
//         return view('auth.login');
//     })->name('login');
// });

// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware('auth');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset-password');

Route::get('/new-password', function () {
    return view('auth.new-password');
})->name('new-password');

Route::get('/two-steps', function () {
    return view('auth.two-steps');
})->name('two-steps');

Route::middleware('auth')->group(function () {
    Route::get('/overview', function () {
        return view('pages.accounts.overview');
    })->name('overview');
});

Route::middleware('auth')->group(function () {
    Route::get('/setting', function () {
        return view('pages.accounts.setting');
    })->name('setting');
});