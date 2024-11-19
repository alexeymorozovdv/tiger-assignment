<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetNumberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'country' => 'required|string|size:2',
            'service' => 'required|string|max:5',
            'rent_time' => 'nullable|integer|min:1|max:24',
        ];
    }

    public function messages(): array
    {
        return [
            'string' => 'Параметр :attribute должен быть строкой',
            'required' => 'Параметр :attribute обязателен',
            'integer' => 'Параметр :attribute должен быть числом',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Ошибка валидации',
            'data' => $validator->errors()
        ]));
    }
}

