<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Apartir de aqui agregaremos nuestros propios controladores
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

    // rutas propias 
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});

require __DIR__.'/auth.php';
