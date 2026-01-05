<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RastreamentoController;

Route::get('/', HomeController::class);
Route::get('/rastreamento', RastreamentoController::class);