<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(Route('login.index'));
});

Route::middleware('checkIfLoggedin')->group(function () {
    Route::resource('login', LoginController::class)->only('index', 'store');

    Route::resource('signup', SignupController::class)->only('index', 'store');
});

Route::get('/dashboard', function () {
    return view('layouts.master');
})->name('dashboard');







Route::resource('forms', FormController::class)->only([
    'index',
    'show',
    'store',
]);
Route::resource('register', RegistrationController::class)->only([
    'index',
    'show',
    'store',
]);
