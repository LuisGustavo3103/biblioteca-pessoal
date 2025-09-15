<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\User\LoginController;
use Illuminate\Database\Eloquent\Attributes\Boot;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->user()) {
        return redirect()->route('books.index');
    }
    return view('index');
});

Route::post('/login', [LoginController::class, 'login'])->name('users.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('users.logout');

Route::middleware(['auth'])->group(function () {

    Route::resource('clients', ClientController::class);
    Route::resource('books', BookController::class);
    Route::resource('lends', LendController::class);
});
