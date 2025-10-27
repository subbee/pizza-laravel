<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ContactController; // ⬅️ Ezt az importot ellenőrizd/add hozzá

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

// 3. PONT: Főoldal (welcome.blade.php)
Route::get('/', function () {
    return view('welcome');
});

// --- Breeze alapértelmezett útvonalak ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Csak bejelentkezett felhasználók által elérhető útvonalak
Route::middleware('auth')->group(function () {
    // Profil útvonalak (Breeze generálta)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 6. PONT: Üzenetek listázása (csak bejelentkezve)
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index'); // ⬅️ EZ AZ ÚJ SOR
});

// --- Vendégek által is elérhető útvonalak ---

// 4. PONT: Pizza Menü
Route::get('/menu', [PizzaController::class, 'index'])->name('pizza.menu');

// 5. PONT: Kapcsolat oldal
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Breeze autentikációs útvonalak betöltése
require __DIR__.'/auth.php';
