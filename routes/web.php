<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Itt regisztrálhatod az alkalmazásod útvonalait.
| Ezeket a RouteServiceProvider tölti be, és mindegyik
| a "web" middleware csoportba tartozik.
|--------------------------------------------------------------------------
*/

// 🌐 Főoldal
Route::get('/', function () {
    return view('welcome');
});

// 🍕 Pizza menü
Route::get('/menu', [PizzaController::class, 'index'])->name('pizza.menu');
Route::get('/pizzak', [PizzaController::class, 'index'])->name('pizzak.index');

// 💌 Kapcsolat oldal (publikus)
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// 🔒 Csak bejelentkezett felhasználóknak
Route::middleware(['auth', 'verified'])->group(function () {

    // Saját profil (Laravel Breeze generálta)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Üzenetek megtekintése (kapcsolat űrlap beérkezett üzenetek)
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Laravel Breeze auth útvonalak
require __DIR__.'/auth.php';
