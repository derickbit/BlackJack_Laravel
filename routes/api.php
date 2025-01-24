<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PartidaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DenunciaController;
use App\Http\Controllers\Api\LoginController;
use App\models\Partida;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('partidas/ranking', [PartidaController::class, 'ranking'])
    ->name('partidas.ranking');

Route::apiResource('partidas', PartidaController::class)
    ->middleware('auth:sanctum');

    Route::apiResource('partidas', PartidaController::class)
    ->only(['index', 'show']);

Route::apiResource('users', UserController::class)
->middleware('auth:sanctum');

Route::apiResource('users', UserController::class)
->only(['index', 'show', 'store']);

Route::get('/jogadores', [UserController::class, 'listarJogadores']);

Route::apiResource('denuncias', DenunciaController::class)
->middleware('auth:sanctum');

Route::apiResource('denuncias', DenunciaController::class)
->only(['index', 'show']);




//Route::get('/ranking', [PartidaController::class, 'ranking']);
// Route::post('/partida' , [PartidaController::class, 'store']);
// Route::post('/denuncia' , [DenunciaController::class, 'store']);
// Route::post('/user' , [UserController::class, 'store']);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])
->middleware('auth:sanctum');
