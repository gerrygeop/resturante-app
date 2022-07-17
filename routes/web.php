<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dapur\{
    DapurController,
    CategoryController,
    MenuController,
    ReservationController,
    TableController
};
use App\Http\Controllers\Guest\{
    CategoryController as CategoryGuest,
    MenuController as MenuGuest,
    ReservationController as ReservationGuest
};
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'welcome']);

Route::name('guest.')->group(function () {
    Route::get('/categories', [CategoryGuest::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryGuest::class, 'show'])->name('categories.show');
    Route::get('/menus', [MenuGuest::class, 'index'])->name('menus.index');

    Route::get('/reservations/step-one', [ReservationGuest::class, 'stepOne'])->name('reservations.step.one');
    Route::post('/reservations/step-one', [ReservationGuest::class, 'storeStepOne'])->name('reservations.store.step.one');

    Route::get('/reservations/step-two', [ReservationGuest::class, 'stepTwo'])->name('reservations.step.two');
    Route::post('/reservations/step-two', [ReservationGuest::class, 'storeStepTwo'])->name('reservations.store.step.two');

    Route::get('/reservations/success', [ReservationGuest::class, 'success'])->name('reservations.success');
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
