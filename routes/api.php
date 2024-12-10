<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PartidaController;
use App\Http\Controllers\Api\CartaController;
use App\Http\Controllers\Api\DenunciaController;
use App\models\Partida;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('partidas', PartidaController::class);

Route::apiResource('cartas', CartaController::class);

Route::apiResource('denuncias', DenunciaController::class);

Route::post('/partida' , [PartidaController::class, 'store']);
Route::post('/denuncia' , [DenunciaController::class, 'store']);
