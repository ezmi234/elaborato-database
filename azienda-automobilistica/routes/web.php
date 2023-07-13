<?php

use App\Http\Controllers\AccessorioController;
use App\Http\Controllers\InterventoController;
use App\Http\Controllers\MeccanicoController;
use App\Http\Controllers\OfficinaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsulenteController;
use App\Http\Controllers\AcquistoInStoreController;
use App\Http\Controllers\RecensioneController;
use App\Http\Controllers\VeicoloController;
use App\Http\Controllers\PezzoDiRicambioController;
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
Route::get('meccanici/show/{meccanico}', [MeccanicoController::class, 'show'])->name('meccanici.show');
Route::get('meccanici/edit/{meccanico}', [MeccanicoController::class, 'edit'])->name('meccanici.edit');
Route::put('meccanici/update/{meccanico}', [MeccanicoController::class, 'update'])->name('meccanici.update');
Route::delete('meccanici/destroy/{meccanico}', [MeccanicoController::class, 'destroy'])->name('meccanici.destroy');

//consulenti methods
Route::get('consulenti/index', [ConsulenteController::class, 'index'])->name('consulenti.index');
Route::get('consulenti/create', [ConsulenteController::class, 'create'])->name('consulenti.create');
Route::post('consulenti/store', [ConsulenteController::class, 'store'])->name('consulenti.store');
Route::get('consulenti/show/{consulente}', [ConsulenteController::class, 'show'])->name('consulenti.show');
Route::get('consulenti/edit/{consulente}', [ConsulenteController::class, 'edit'])->name('consulenti.edit');
Route::put('consulenti/update/{consulente}', [ConsulenteController::class, 'update'])->name('consulenti.update');
Route::delete('consulenti/destroy/{consulente}', [ConsulenteController::class, 'destroy'])->name('consulenti.destroy');

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
Route::get('recensioni/create', [RecensioneController::class, 'create'])->name('recensioni.create');
Route::post('recensioni/store', [RecensioneController::class, 'store'])->name('recensioni.store');
Route::get('recensioni/show/{recensione}', [RecensioneController::class, 'show'])->name('recensioni.show');
Route::get('recensioni/edit/{recensione}', [RecensioneController::class, 'edit'])->name('recensioni.edit');
Route::put('recensioni/update/{recensione}', [RecensioneController::class, 'update'])->name('recensioni.update');
Route::delete('recensioni/destroy/{recensione}', [RecensioneController::class, 'destroy'])->name('recensioni.destroy');

//veicoli methods
Route::get('veicoli/index', [VeicoloController::class, 'index'])->name('veicoli.index');
Route::get('veicoli/create', [VeicoloController::class, 'create'])->name('veicoli.create');
Route::post('veicoli/store', [VeicoloController::class, 'store'])->name('veicoli.store');
Route::get('veicoli/show/{veicolo}', [VeicoloController::class, 'show'])->name('veicoli.show');
Route::get('veicoli/edit/{veicolo}', [VeicoloController::class, 'edit'])->name('veicoli.edit');
Route::put('veicoli/update/{veicolo}', [VeicoloController::class, 'update'])->name('veicoli.update');
Route::delete('veicoli/destroy/{veicolo}', [VeicoloController::class, 'destroy'])->name('veicoli.destroy');


//pezzi_di_ricambio methods
Route::get('pezzi_di_ricambio/index', [PezzoDiRicambioController::class, 'index'])->name('pezzi_di_ricambio.index');
Route::get('pezzi_di_ricambio/create', [PezzoDiRicambioController::class, 'create'])->name('pezzi_di_ricambio.create');
Route::post('pezzi_di_ricambio/store', [PezzoDiRicambioController::class, 'store'])->name('pezzi_di_ricambio.store');
Route::get('pezzi_di_ricambio/show/{pezzo}', [PezzoDiRicambioController::class, 'show'])->name('pezzi_di_ricambio.show');
Route::get('pezzi_di_ricambio/edit/{pezzo}', [PezzoDiRicambioController::class, 'edit'])->name('pezzi_di_ricambio.edit');
Route::put('pezzi_di_ricambio/update/{pezzo}', [PezzoDiRicambioController::class, 'update'])->name('pezzi_di_ricambio.update');
Route::delete('pezzi_di_ricambio/destroy/{pezzo}', [PezzoDiRicambioController::class, 'destroy'])->name('pezzi_di_ricambio.destroy');

//interventi methods
Route::get('interventi/index', [InterventoController::class, 'index'])->name('interventi.index');
Route::get('interventi/create', [InterventoController::class, 'create'])->name('interventi.create');
Route::post('interventi/store', [InterventoController::class, 'store'])->name('interventi.store');
Route::get('interventi/show/{intervento}', [InterventoController::class, 'show'])->name('interventi.show');
Route::get('interventi/edit/{intervento}', [InterventoController::class, 'edit'])->name('interventi.edit');
Route::put('interventi/update/{intervento}', [InterventoController::class, 'update'])->name('interventi.update');
Route::delete('interventi/destroy/{intervento}', [InterventoController::class, 'destroy'])->name('interventi.destroy');
