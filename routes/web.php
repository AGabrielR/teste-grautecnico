<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;

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

Route::get('/add/categoria', [CategoriaController::class, 'index'])->name('createCategory');

Route::post('/register/categoria', [CategoriaController::class, 'store'])->name('registerCategory');
