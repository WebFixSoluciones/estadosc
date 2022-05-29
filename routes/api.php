<?php

use App\Http\Controllers\CategoriaCursoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('categoria/{categoriaCurso}', [CategoriaCursoController::class, 'edit']);
Route::get('curso/{curso}', [CursoController::class, 'edit']);
Route::get('usuario/{usuario}', [UserController::class, 'edit']);
Route::get('getCertificados/{dni}', [CertificadoController::class, 'index_usu']);
Route::get('getCertificado/{certificado}', [CertificadoController::class, 'getCertificado']);
