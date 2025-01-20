<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CalculateRequest;
use Cyrulik\SimpleCalculator\Calculator;
use Cyrulik\SimpleCalculator\OperationFactory;
use Illuminate\Http\JsonResponse;

class CalculatorController extends Controller
{
    public function calculate(CalculateRequest $request): JsonResponse
    {
        $calculator = new Calculator(new OperationFactory());

        return response()->json([
            'result' => $calculator->calculate(
                $request->input('operation'),
                $request->input('a'),
                $request->input('b')
            ),
        ]);
    }
}
