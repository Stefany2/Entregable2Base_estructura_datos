<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NuevoControlador;


Route::get('/estudiantes', [NuevoControlador::class, 'index']);

Route::get('/estudiantes/{id}', [NuevoControlador::class, 'show']);

Route::post('estudiantes', [NuevoControlador::class, 'store']);

Route::put('/estudiantes/{id}', [NuevoControlador::class, 'update']);

Route::patch('/estudiantes/{id}', [NuevoControlador::class, 'updatePartial']);

Route::delete('/estudiantes/{id}', [NuevoControlador::class, 'destroy']);




