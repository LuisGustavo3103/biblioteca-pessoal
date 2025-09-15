<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LendResquest extends FormRequest
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
            'book_id' => 'required|exists:books,id',
            'person_id' => 'required|exists:persons,id',
            'expected_return_date' => 'required|date',
            'description' => 'nullable|max:255'
        ];
    }
}
