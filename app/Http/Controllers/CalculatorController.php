<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\CalculateRequest;
use Cyrulik\SimpleCalculator\Calculator;
use Illuminate\Contracts\Support\Renderable;

class CalculatorController extends Controller
{
    public function index(): Renderable
    {
        return view('calculator.index');
    }

    public function indexJs(): Renderable
    {
        return view('calculator.index-js');
    }

    public function calculate(CalculateRequest $request, Calculator $calculator): Renderable
    {
        return view('calculator.index', [
            'result' => $calculator->calculate(
                $request->input('operation'),
                $request->input('a'),
                $request->input('b')
            ),
        ]);
    }
}
