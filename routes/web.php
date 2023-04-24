<?php

use App\Http\Controllers\ClienteController;
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

Route::get('/', [ClienteController::class, 'index'])->name('dashboard.home');

Route::get('/cliente/create', [ClienteController::class, 'create'])->name('crea_utente');
Route::post('/cliente', [ClienteController::class, 'store'])->name('store_cliente');

Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit'])->name('edit_cliente');
Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('summary_cliente');
