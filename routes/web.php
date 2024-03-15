<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\EnfermeirasController;
use App\Http\Controllers\EscutaInicialController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard.corpo');
// });

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//--------------------------------------PACIENTES---------------------------------------------------------
Route::get('/pacientes/listagemPaciente', [PacientesController::class, 'index'])->name('listagemPaciente');
Route::get('/pacientes/cadastroPaciente', [PacientesController::class, 'form'])->name('cadastroPaciente');
Route::post('/pacientes/storePaciente', [PacientesController::class, 'store'])->name('storePaciente');
Route::get('/pacientes/createPaciente', [PacientesController::class, 'create'])->name('createPaciente');
Route::get('/pacientes/deletarPaciente/{id}', [PacientesController::class, 'destroy'])->name('deletarPaciente');
Route::get('/pacientes/editarPaciente/{id}', [PacientesController::class, 'edit'])->name('editarPaciente');

//--------------------------------------MEDICOS-----------------------------------------------------------
Route::get('/medicos/listagemMedico', [MedicosController::class, 'index'])->name('listagemMedico');
Route::get('/medicos/cadastroMedico', [MedicosController::class, 'form'])->name('cadastroMedico');
Route::post('/medicos/storeMedico', [MedicosController::class, 'store'])->name('storeMedico');
Route::get('/medicos/createMedico', [MedicosController::class, 'create'])->name('createMedico');
Route::get('/medicos/deletarMedico/{id}', [MedicosController::class, 'destroy'])->name('deletarMedico');
Route::get('/medicos/editarMedico/{id}', [MedicosController::class, 'edit'])->name('editarMedico');

//--------------------------------------ENFERMEIRAS-------------------------------------------------------
Route::get('/enfermeiras/listagemEnfermeira', [EnfermeirasController::class, 'index'])->name('listagemEnfermeira');
Route::get('/enfermeiras/cadastroEnfermeira', [EnfermeirasController::class, 'form'])->name('cadastroEnfermeira');
Route::post('/enfermeiras/storeEnfermeira', [EnfermeirasController::class, 'store'])->name('storeEnfermeira');
Route::get('/enfermeiras/createEnfermeira', [EnfermeirasController::class, 'create'])->name('createEnfermeira');
Route::get('/enfermeiras/deletarEnfermeira/{id}', [EnfermeirasController::class, 'destroy'])->name('deletarEnfermeira');
Route::get('/enfermeiras/editarEnfermeira/{id}', [EnfermeirasController::class, 'edit'])->name('editarEnfermeira');

//-----------------------------------ESCUTA INICIAL--------------------------------------------------------
Route::get('/escutaInicial/listagemPacienteEscuta', [EscutaInicialController::class, 'index'])->name('listagemPacienteEscuta');
Route::get('/escutaInicial/cadastroEscutaInicial', [EscutaInicialController::class, 'form'])->name('cadastroEscutaInicial');
Route::post('/escutaInicial/storeEscutaInicial', [EscutaInicialController::class, 'store'])->name('storeEscutaInicial');
Route::get('/escutaInicial/createEscutaInicial', [EscutaInicialController::class, 'create'])->name('createEscutaInicial');
Route::get('/escutaInicial/deletarEscutaInicial/{id}', [EscutaInicialController::class, 'destroy'])->name('deletarEscutaInicial');
Route::get('/escutaInicial/editarEscutaInicial/{id}', [EscutaInicialController::class, 'edit'])->name('editarEscutaInicial');

