<?php
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Display all properties and home page
Route::get('/', [PropertyController::class, 'index'])->name('home');
Route::get('/acceuil', [PropertyController::class, 'index']);
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// Display properties for sale and rent
Route::get('/properties/achats', [PropertyController::class, 'acheter'])->name('properties.achats');
Route::get('/properties/louer', [PropertyController::class, 'louer'])->name('properties.louer');

// Display property details
Route::get('/details/{id}', [PropertyController::class, 'show'])->name('details');

// Search route
Route::get('/result', [PropertyController::class, 'search'])->name('search');

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

    // Image upload routes
    // Route::post('/image/create', [ImageController::class, 'store'])->name('image.store');
    Route::post('/images/store', [ImageController::class, 'store'])->name('images.store');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Auth scaffold routes
Auth::routes();

// Redirect to home after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/properties/achater', [PropertyController::class, 'vender'])->name('properties.achats');

// Route::resource('properties', PropertyController::class);

Route::post('properties/create', [PropertyController::class, 'store'])->name('properties.vender');

Route::get('/insertImages',[ImageController::class ,'create'])->name('insertImages');


// Route::get('/get-cities', [PropertyController::class, 'getCities'])->name('get-cities');
