<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MallaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\InscripcionController;

/* ========= DASHBOARD ========= */
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

/* ========= CRUD NORMALES ========= */
Route::resource('alumno', AlumnoController::class);
Route::resource('facultad', FacultadController::class);
Route::resource('carrera', CarreraController::class);
Route::resource('materia', MateriaController::class);

/* ========= MALLA (CLAVE COMPUESTA) ========= */
Route::get('malla', [MallaController::class, 'index'])->name('malla.index');
Route::get('malla/create', [MallaController::class, 'create'])->name('malla.create');
Route::post('malla', [MallaController::class, 'store'])->name('malla.store');

Route::get('malla/{facultad}/{carrera}/{codigo}/edit', [MallaController::class, 'edit'])->name('malla.edit');
Route::put('malla/{facultad}/{carrera}/{codigo}', [MallaController::class, 'update'])->name('malla.update');
Route::delete('malla/{facultad}/{carrera}/{codigo}', [MallaController::class, 'destroy'])->name('malla.destroy');

/* ========= INSCRIPCIÓN (CLAVE COMPUESTA) ========= */
Route::get('inscripcion', [InscripcionController::class, 'index'])->name('inscripcion.index');
Route::get('inscripcion/create', [InscripcionController::class, 'create'])->name('inscripcion.create');
Route::post('inscripcion', [InscripcionController::class, 'store'])->name('inscripcion.store');

Route::get('inscripcion/{alumno}/{materia}/{periodo}/edit', [InscripcionController::class, 'edit'])->name('inscripcion.edit');
Route::put('inscripcion/{alumno}/{materia}/{periodo}', [InscripcionController::class, 'update'])->name('inscripcion.update');
Route::delete('inscripcion/{alumno}/{materia}/{periodo}', [InscripcionController::class, 'destroy'])->name('inscripcion.destroy');
