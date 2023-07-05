<?php

use App\Http\Controllers\AccessorioController;
use App\Http\Controllers\MeccanicoController;
use App\Http\Controllers\OfficinaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AcquistoInStoreController;
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

Route::get('/', function () {
    return view('index');
})->name('/');

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

//meccanici methods
Route::get('meccanici/index', [MeccanicoController::class, 'index'])->name('meccanici.index');
Route::get('meccanici/create', [MeccanicoController::class, 'create'])->name('meccanici.create');
Route::post('meccanici/store', [MeccanicoController::class, 'store'])->name('meccanici.store');

//acquisti methods
Route::get('acquisti/index', [AcquistoInStoreController::class, 'index'])->name('acquisti.index');
Route::get('acquisti/create', [AcquistoInStoreController::class, 'create'])->name('acquisti.create');
Route::post('acquisti/store', [AcquistoInStoreController::class, 'store'])->name('acquisti.store');
Route::get('acquisti/show/{acquisto}', [AcquistoInStoreController::class, 'show'])->name('acquisti.show');
Route::get('acquisti/edit/{acquisto}', [AcquistoInStoreController::class, 'edit'])->name('acquisti.edit');
Route::put('acquisti/update/{acquisto}', [AcquistoInStoreController::class, 'update'])->name('acquisti.update');
Route::delete('acquisti/destroy/{acquisto}', [AcquistoInStoreController::class, 'destroy'])->name('acquisti.destroy');

//consulenti methods
Route::get('consulenti/index', [ConsulenteController::class, 'index'])->name('consulenti.index');


//accessori methods
Route::get('accessori/index', [AccessorioController::class, 'index'])->name('accessori.index');
Route::get('accessori/create', [AccessorioController::class, 'create'])->name('accessori.create');
Route::post('accessori/store', [AccessorioController::class, 'store'])->name('accessori.store');
Route::get('accessori/show/{accessorio}', [AccessorioController::class, 'show'])->name('accessori.show');
Route::get('accessori/edit/{accessorio}', [AccessorioController::class, 'edit'])->name('accessori.edit');
Route::put('accessori/update/{accessorio}', [AccessorioController::class, 'update'])->name('accessori.update');
Route::delete('accessori/destroy/{accessorio}', [AccessorioController::class, 'destroy'])->name('accessori.destroy');

//acquisti_in_store methods
Route::get('acquisti_in_store/index', [AcquistoInStoreController::class, 'index'])->name('acquisti_in_store.index');
Route::get('acquisti_in_store/create', [AcquistoInStoreController::class, 'create'])->name('acquisti_in_store.create');
Route::post('acquisti_in_store/store', [AcquistoInStoreController::class, 'store'])->name('acquisti_in_store.store');
Route::get('acquisti_in_store/show/{acquisto}', [AcquistoInStoreController::class, 'show'])->name('acquisti_in_store.show');
Route::delete('acquisti_in_store/destroy/{acquisto}', [AcquistoInStoreController::class, 'destroy'])->name('acquisti_in_store.destroy');
Route::post('acquisti_in_store/storeAccessori', [AcquistoInStoreController::class, 'storeAccessori'])->name('acquisti_in_store.storeAccessori');


//recensioni methods
Route::get('recensioni/index', [RecensioneController::class, 'index'])->name('recensioni.index');
