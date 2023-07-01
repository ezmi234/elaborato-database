<?php

use App\Http\Controllers\OfficinaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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

Route::get('/', function () {
    return view('index');
});

//officine methods
Route::get('officine/index', [OfficinaController::class, 'index'])->name('officine.index');
Route::get('officine/create', [OfficinaController::class, 'create'])->name('officine.create');
Route::post('officine/store', [OfficinaController::class, 'store'])->name('officine.store');
Route::get('officine/show/{officina}', [OfficinaController::class, 'show'])->name('officine.show');
Route::get('officine/edit/{officina}', [OfficinaController::class, 'edit'])->name('officine.edit');
Route::put('officine/update/{officina}', [OfficinaController::class, 'update'])->name('officine.update');
Route::delete('officine/destroy/{officina}', [OfficinaController::class, 'destroy'])->name('officine.destroy');

// client methods
Route::get('clienti/index', [ClienteController::class, 'index'])->name('clienti.index');
Route::get('clienti/create', [ClienteController::class, 'create'])->name('clienti.create');
Route::post('clienti/store', [ClienteController::class, 'store'])->name('clienti.store');
Route::get('clienti/show/{cliente}', [ClienteController::class, 'show'])->name('clienti.show');
Route::get('clienti/edit/{cliente}', [ClienteController::class, 'edit'])->name('clienti.edit');
Route::put('clienti/update/{cliente}', [ClienteController::class, 'update'])->name('clienti.update');
Route::delete('clienti/destroy/{cliente}', [ClienteController::class, 'destroy'])->name('clienti.destroy');

