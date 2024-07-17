<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;


Route::prefix('clients')->group(function() {
    Route::get('/', [ClientsController::class, 'index'])->name('clients-index');

    Route::get('/create', [ClientsController::class, 'create'])->name('clients-create');

    Route::post('/', [ClientsController::class, 'store'])->name('clients-store');

    Route::get('/{id}/edit', [ClientsController::class, 'edit'])->where('id', '[0-9]+')->name('clients-edit');

    Route::put('/{id}', [ClientsController::class, 'update'])->where('id', '[0-9]+')->name('clients-update');

    Route::delete('/{id}', [ClientsController::class, 'destroy'])->where('id', '[0-9]+')->name('clients-destroy');

});