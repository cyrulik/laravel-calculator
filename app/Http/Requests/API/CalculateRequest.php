<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'operation' => 'required|string|in:addition,subtraction,multiplication,division',
            'a' => 'required|numeric',
            'b' => 'required|numeric',
        ];
    }
}
