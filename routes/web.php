<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoinsController;

Route::get('/', function () {
    return view('index');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegister'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('coins', [CoinsController::class, 'coins'])->name('coins');
Route::post('post-coins', [CoinsController::class, 'addCoin'])->name('coins.post');
Route::get('coin/{id}/edit', [CoinsController::class, 'editCoin'])->name('edit-coin');
Route::post('coin/{id}/update', [CoinsController::class, 'updateCoin'])->name('update-coin');
Route::get('coin/{id}/delete', [CoinsController::class, 'deleteCoin'])->name('delete-coin');

Route::get('admin', [AdminController::class, 'admin'])->name('admin');
Route::get('print-user', [AdminController::class, 'printUser'])->name('print-user');
Route::get('print-coin', [AdminController::class, 'printCoin'])->name('print-coin');
