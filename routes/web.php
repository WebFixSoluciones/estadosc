<?php
namespace App\Http\Controllers;

use App\Models\CargaCategorias;
use App\Models\Certificado;
use App\Models\Curso;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [WelcomeController::class, 'index']);
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_post'])->name('login_post');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('verificarCertificado/{certificado}', [CertificadoController::class, 'verificarCertificado'])->name('verificarCertificado');

Route::group(['prefix' => 'administrador'], function () {
    Route::get('home', [WelcomeController::class, 'home'])->name('home');

    Route::get('categorias', [CategoriaCursoController::class, 'index'])->name('categorias');
    Route::post('saveCategoria', [CategoriaCursoController::class, 'store'])->name('saveCategoria');
    Route::get('deleteCategoria/{categoriaCurso}', [CategoriaCursoController::class, 'destroy'])->name('deleteCategoria');
    Route::post('updateCategoria', [CategoriaCursoController::class, 'update'])->name('updateCategoria');
    Route::get('cargaCategorias', [CargaCategoriasController::class, 'index'])->name('cargaCategorias');
    Route::post('cargaCategorias', [CargaCategoriasController::class, 'store'])->name('cargaCategorias_post');

    Route::get('cursos', [CursoController::class, 'index'])->name('cursos');
    Route::post('saveCurso', [CursoController::class, 'store'])->name('saveCurso');
    Route::get('deleteCurso/{curso}',[CursoController::class, 'destroy'])->name('deleteCurso');
    Route::post('updateCurso', [CursoController::class, 'update'])->name('updateCurso');
    Route::get('cargaCursos', [CursoController::class, 'carga'])->name('cargaCurso');
    Route::post('cargaCursos', [CursoController::class, 'cargaStore'])->name('cargaCursos_post');

    Route::get('usuarios', [UserController::class, 'index'])->name('usuarios');
    Route::post('saveUsuario', [UserController::class, 'store'])->name('saveUsuario');
    Route::get('deleteUsuario/{usuario}', [UserController::class, 'destroy'])->name('deleteUsuario');
    Route::post('updateUsuario', [UserController::class, 'update'])->name('updateUsuario');
    Route::get('cargaUsuario', [UserController::class, 'carga'])->name('cargaUsuario');
    Route::post('cargaUsuario', [UserController::class, 'carga_post'])->name('cargaUsuario_post');

    Route::get('certificados', [CertificadoController::class, 'index'])->name('certificados');
    Route::get('deleteCertificado/{certificado}', [CertificadoController::class, 'destroy'])->name('deleteCertificado');
    Route::get('cargarCertificados', [CertificadoController::class, 'carga'])->name('cargarCertificados');
    Route::post('cargarCertificados', [CertificadoController::class, 'carga_post'])->name('cargarCertificados_post');
    Route::get('generarPdf/{certificado}', [CertificadoController::class, 'pdf'])->name('getPdf');
    Route::get('generarPng/{certificado}', [CertificadoController::class, 'png'])->name('getPng');
});


