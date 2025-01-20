<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/js', [CalculatorController::class, 'indexJs'])->name('calculator.js');

Route::get('/', [CalculatorController::class, 'index'])->name('home');
Route::post('/calculate', [CalculatorController::class, 'calculate'])->name('calculate');
