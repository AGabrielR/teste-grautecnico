<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add/categoria', [CategoriaController::class, 'index'])->name('createCategory')->middleware('auth');

Route::POST('/register/categoria', [CategoriaController::class, 'store'])->name('registerCategory')->middleware('auth');

Route::get('/add/client', [ClienteController::class, 'index'])->name('createClient')->middleware('auth');

Route::POST('/register/client', [ClienteController::class, 'store'])->name('registerClient')->middleware('auth');