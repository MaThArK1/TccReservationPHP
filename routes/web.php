<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('app-home');


Route::prefix('clients')->group(function() {
    Route::get('/', [ClientsController::class, 'index'])->name('clients-index');

    Route::get('/create', [ClientsController::class, 'create'])->name('clients-create');

    Route::post('/', [ClientsController::class, 'store'])->name('clients-store');

    Route::get('/{id}/edit', [ClientsController::class, 'edit'])->where('id', '[0-9]+')->name('clients-edit');

    Route::put('/{id}', [ClientsController::class, 'update'])->where('id', '[0-9]+')->name('clients-update');

    Route::delete('/{id}', [ClientsController::class, 'destroy'])->where('id', '[0-9]+')->name('clients-destroy');

});

Route::prefix('reservations')->group(function() {
    Route::get('/', [ReservationsController::class, 'index'])->name('reservations-index');

    Route::get('/create', [ReservationsController::class, 'create'])->name('reservations-create');

    Route::post('/', [ReservationsController::class, 'store'])->name('reservations-store');

    Route::get('/{id}/edit', [ReservationsController::class, 'edit'])->where('id', '[0-9]+')->name('reservations-edit');

    Route::put('/{id}', [ReservationsController::class, 'update'])->where('id', '[0-9]+')->name('reservations-update');

    Route::delete('/{id}', [ReservationsController::class, 'destroy'])->where('id', '[0-9]+')->name('reservations-destroy');
});