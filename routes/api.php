<?php

use App\Http\Controllers\ConveniosController;
use App\Http\Controllers\InstituicoesController;
use App\Http\Controllers\SimulacaoCreditoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api'
], function () {
    Route::get('/institutions',       [InstituicoesController::class, 'index']);
    Route::get('/covenants',          [ConveniosController::class, 'index']);
    Route::post('/simulation-credit', [SimulacaoCreditoController::class, 'creditSimulation']);
});