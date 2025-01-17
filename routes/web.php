<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(Route('login.index'));
});

Route::middleware('checkIfLoggedin')->group(function () {
    Route::resource('login', LoginController::class)
        ->only('index', 'store');

    Route::resource('signup', SignupController::class)
        ->only('index', 'store');

    Route::get('/signout', [SignoutController::class, 'logout'])
        ->name('signout');
});

Route::middleware('ensureAuthorizedAccess')->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.master');
    })->name('dashboard');

    Route::resource('users', UserController::class)
        ->only('index', 'destroy', 'update', 'edit');

    Route::get('/user/edit/{userId}', function ($userId) {

    });
});
