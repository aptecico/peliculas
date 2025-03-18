<?php

use App\Http\Controllers\ClasificacionesController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('generos', GenerosController::class);
    Route::resource('clasificaciones', ClasificacionesController::class);
    Route::resource('peliculas', PeliculasController::class);
});

require __DIR__.'/auth.php';
