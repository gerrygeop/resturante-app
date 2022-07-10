<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dapur\{DapurController, CategoryController, MenuController, ReservationController, TableController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('dapur.')->prefix('dapur')->group(function () {
    Route::get('/', [DapurController::class, 'index'])->name('index');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
});

require __DIR__ . '/auth.php';
