<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController; // ⬅️ EZ AZ ÚJ SOR

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
});

// ⬅️ EZ AZ ÚJ ÚTVONAL A 4. PONTHOZ
Route::get('/menu', [PizzaController::class, 'index'])->name('pizza.menu');

// 5. PONT: Kapcsolat oldal
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show'); // Az űrlap megjelenítése
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Az űrlap feldolgozása
require __DIR__.'/auth.php';
