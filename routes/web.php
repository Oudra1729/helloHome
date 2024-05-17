<?php
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LoginController;
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


Route::get('/properties/achats', [PropertyController::class, 'vender']);

Route::get('/properties/louer', [PropertyController::class, 'louer']);

// Route::get('/ajouter', [PropertyController::class, 'ajouter'])->name('ajouter');



// Route to display the form
Route::get('/properties/ajouter', [PropertyController::class, 'create'])->name('properties.create');


// Route to handle the form submission
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
