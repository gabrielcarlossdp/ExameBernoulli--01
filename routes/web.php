<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CampeoesController;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::post('/salvar', [HomeController::class,'salvar'])->name('salvar');
Route::get('/atualizar', [HomeController::class,'atualizar'])->name('atualizar');
Route::get('/campeoes', [CampeoesController::class,'index'])->name('campeoes');
Route::post('/salvar_campeoes', [CampeoesController::class,'salvar'])->name('salvar_campeoes');
Route::get('/atualizar_campeoes', [CampeoesController::class,'atualizar'])->name('atualizar_campeoes');
