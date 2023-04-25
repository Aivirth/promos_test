<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
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

Route::get('/', function(){
    return view('welcome', ['pageTitle' => 'Home']);
})->name('home');

Route::get('/clienti', [ClienteController::class, 'index'])->name('all_clienti');

Route::get('/cliente/create', [ClienteController::class, 'create'])->name('crea_utente');
Route::post('/cliente/add', [ClienteController::class, 'store'])->name('store_cliente');

Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit'])->name('edit_cliente');
Route::put('/cliente/{id}/update', [ClienteController::class, 'update'])->name('update_cliente');
Route::delete('/cliente/{id}/delete', [ClienteController::class, 'destroy'])->name('delete_cliente');
Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('summary_cliente');


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/user/authenticate', [UserController::class, 'authenticate'])->name('authenticate');