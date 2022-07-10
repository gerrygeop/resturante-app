<?php

use App\Http\Controllers\Dapur\DapurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('dapur.')->prefix('dapur')->group(function () {
    Route::get('/', [DapurController::class, 'index'])->name('index');
});

require __DIR__ . '/auth.php';
