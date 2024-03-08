<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;

Route::get('/', function () {
    return view('welcome');
});

// Routes for CastController
Route::get('/casts', [CastController::class, 'index'])->name('casts.index');
Route::get('/casts/create', [CastController::class, 'create'])->name('casts.create');
Route::post('/casts', [CastController::class, 'store'])->name('casts.store');
Route::get('/casts/{cast}', [CastController::class, 'show'])->name('casts.show');
Route::get('/casts/{cast}/edit', [CastController::class, 'edit'])->name('casts.edit');
Route::put('/casts/{cast}', [CastController::class, 'update'])->name('casts.update');
Route::delete('/casts/{cast}', [CastController::class, 'destroy'])->name('casts.destroy');
