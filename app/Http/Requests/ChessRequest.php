<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'n' => 'required|integer|min:1|max:100000',
            'k' => 'required|integer|min:0|max:100000',
            'rq' => 'required|integer|min:1',
            'cq' => 'required|integer|min:1',
            'obstacles' => 'array',
            'obstacles.*' => 'array',
            'obstacles.*.*' => 'integer|min:1',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], 400));
    }

    public function messages(): array
    {
        return [
            'n.max' => 'The n cannot exceed 10^5 characters.',
            'k.max' => 'The k cannot exceed 10^5 characters.',
        ];
    }
}
