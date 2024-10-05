<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home and properties routes
Route::get('/', [PropertyController::class, 'index'])->name('home');
Route::get('/acceuil', [PropertyController::class, 'index']);
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// Properties for sale and rent
Route::get('/properties/achats', [PropertyController::class, 'acheter'])->name('properties.achats');
Route::get('/properties/louer', [PropertyController::class, 'louer'])->name('properties.louer');

// Property details and search
Route::get('/details/{id}', [PropertyController::class, 'show'])->name('details');
Route::get('/result', [PropertyController::class, 'search'])->name('search');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

    // Edit, update, and delete properties
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    // Image upload
    Route::post('/images/store', [ImageController::class, 'store'])->name('images.store');
    Route::get('/insertImages', [ImageController::class, 'create'])->name('insertImages');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Auth scaffolding
Auth::routes();

// Redirect to home after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Remove redundant route
// Route::post('properties/create', [PropertyController::class, 'store'])->name('properties.vender'); // Duplicate
