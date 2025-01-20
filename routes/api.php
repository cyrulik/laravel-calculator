<?php

use App\Http\Controllers\API\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'api.'], static function () {
    Route::post('calculate', [CalculatorController::class, 'calculate'])->name('calculate');
});
