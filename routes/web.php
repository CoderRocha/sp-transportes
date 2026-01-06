<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RastreamentoController;
use App\Http\Controllers\HistoricoController;

Route::get('/', HomeController::class);
Route::get('/rastreamento', RastreamentoController::class)->name('frete.rastreamento');
Route::get('/historico', HistoricoController::class)->name('frete.historico');