<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/properties', [PropertyController::class, 'index']);

// aficher acceuil
Route::get('/', [PropertyController::class, 'index']);

Route::get('/acceuil', [PropertyController::class, 'index']);

// Search route
Route::get('/result', [PropertyController::class, 'search'])->name('search');

Route::get('/properties/achats', [PropertyController::class, 'vender']);

Route::get('/properties/louer', [PropertyController::class, 'louer']);

// Route::get('/ajouter', [PropertyController::class, 'ajouter'])->name('ajouter');


Route::middleware(['auth'])->group(function () {
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
});
// // Route to display the form
// Route::get('/properties/ajouter', [PropertyController::class, 'create'])->name('properties.create');


// Route to handle the form submission
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

Route::post('/image/create', [ImageController::class, 'store'])->name('image.store');

Route::post('/images/store', [ImageController::class, 'store'])->name('images.store');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');
