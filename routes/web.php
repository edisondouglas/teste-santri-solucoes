<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect('dashboard');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard/buscar', [HomeController::class, 'buscar'])->middleware(['auth'])->name('buscar');
Route::get('/delete/{usuario}', [HomeController::class, 'desativar'])->middleware(['auth'])->name('desativar');
Route::get('/ativar/{usuario}', [HomeController::class, 'ativar'])->middleware(['auth'])->name('ativar');

require __DIR__.'/auth.php';
