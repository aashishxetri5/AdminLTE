<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(Route('signin.index'));
});

Route::get('/login', function () {
    return redirect(Route('signin.index'));
})->name('login');

Route::resource('signin', LoginController::class)
    ->only('index', 'store');

Route::resource('signup', SignupController::class)
    ->only('index', 'store');


// Route::middleware('ensureAuthorizedAccess')->group(function () {
Route::middleware('auth')->group(function () {
    Route::get('/signout', [SignoutController::class, 'logout'])
        ->name('signout');

    Route::resource('dashboard', DashboardController::class)->only('index');

    Route::resource('users', UserController::class)
        ->only('index', 'destroy', 'update', 'edit')
        ->middleware("can:isAdmin");

    Route::resource('profile', ProfileController::class)
        ->only('index');

    Route::resource('complain', ComplainController::class)
        ->only('index', 'store', 'showComplainList', 'destroy');

    Route::get('/complains', [ComplainController::class, 'showComplainList'])
        ->name('showComplains');

    Route::resource('books', BookController::class)
        ->only('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');

    Route::resource('authors', AuthorController::class)
        ->only('index', 'store', 'edit', 'destroy', 'update');

    Route::resource('genres', GenreController::class)
        ->only('index', 'store', 'edit', 'destroy', 'update');

    Route::resource('reviews', ReviewsController::class)
        ->only('index', 'store', 'destroy', 'update');
});
