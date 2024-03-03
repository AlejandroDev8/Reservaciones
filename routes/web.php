<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ReservacionController::class, 'index'])->middleware(['auth', 'verified'])->name('reservaciones.index');
Route::get('/reservaciones/create', [ReservacionController::class, 'create'])->middleware(['auth', 'verified'])->name('reservaciones.create');
Route::get('/reservaciones/{reservacion}/edit', [ReservacionController::class, 'edit'])->middleware(['auth', 'verified'])->name('reservaciones.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
