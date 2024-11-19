<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetStatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'activation' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'string' => 'Параметр :attribute должен быть строкой',
            'required' => 'Параметр :attribute обязателен',
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
