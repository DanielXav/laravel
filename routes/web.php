<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
    //return redirect('/clientes');
    return view('welcome');
})->middleware(\App\Http\Middleware\Autenticador::class);

Route::resource('/clientes', \App\Http\Controllers\ClientesController::class)
    ->except(['show'])->middleware(\App\Http\Middleware\Autenticador::class);

Route::resource('/eventos', \App\Http\Controllers\EventosController::class)
    ->except(['show'])->middleware(\App\Http\Middleware\Autenticador::class);

Route::get('/relatorio', [\App\Http\Controllers\RelatorioController::class, 'index'])
    ->name('relatorio.index')->middleware(\App\Http\Middleware\Autenticador::class);

Route::get('/como-usar', function () {
    return view('como-usar');
})->name('como-usar')->middleware(\App\Http\Middleware\Autenticador::class);

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store'])
    ->name('sair');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'destroy'])
    ->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');
