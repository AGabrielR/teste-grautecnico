<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;

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

Route::get('/relatory/client', [ClienteController::class, 'relatory'])->name('relatoryClient')->middleware('auth');

Route::get('/relatory/user', [UserController::class, 'relatory'])->name('relatoryUser')->middleware('auth');

Route::get('/relatory/category', [CategoriaController::class, 'relatory'])->name('relatoryCat')->middleware('auth');

Route::delete('/delete/user/{id}', [UserController::class, 'destroy'])->name('deleteUser')->middleware('auth');

Route::delete('/delete/client/{id}', [ClienteController::class, 'destroy'])->name('deleteCliente')->middleware('auth');

Route::delete('/delete/category/{id}', [CategoriaController::class, 'destroy'])->name('deleteCategoria')->middleware('auth');

Route::put('/update/user/{id}', [UserController::class, 'update'])->name('updateUser')->middleware('auth');

Route::put('/update/client/{id}', [ClienteController::class, 'update'])->name('updateCliente')->middleware('auth');

Route::ptu('/update/category/{id}', [CategoriaController::class, 'update'])->name('updateCategoria')->middleware('auth');