<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class CalculatorController extends Controller
{
    public function index(): Renderable
    {
        return view('calculator.index');
    }
}
