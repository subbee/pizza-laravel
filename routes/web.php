<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PizzaCrudController;
use App\Http\Controllers\OrderController;

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

//  Pizza menü (publikus)
Route::get('/menu', [PizzaController::class, 'index'])->name('pizza.menu');
Route::get('/pizzak', [PizzaController::class, 'index'])->name('pizzak.index');

//  Kapcsolat oldal (publikus)
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//  Csak bejelentkezett, hitelesített felhasználóknak
Route::middleware(['auth', 'verified'])->group(function () {
    // Saját profil (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/rendeles/{pizza_id}', [OrderController::class, 'create'])->name("order.create");
    Route::post('/rendeles-leadas', [OrderController::class, 'store'])->name("order.store");

    // Üzenetek megtekintése

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin felület — csak bejelentkezett adminoknak
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('/admin/pizzak', PizzaCrudController::class)->names("admin.pizzak");
    Route::get('/admin/rendelesek', [OrderController::class, 'index'])->name("admin.orders.index");
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');

});

require __DIR__.'/auth.php';

