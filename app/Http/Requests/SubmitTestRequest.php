<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitTestRequest extends FormRequest
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
            'answers' => 'required|array',
            'answers.*' => 'required',
        ];
    }
    
    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // 'answers.required' => 'Please provide an answer for all questions.',
            // 'answers.array' => 'Please provide an answer for all questions.',
            'answers.*.required' => 'Please provide an answer for all questions.'
        ];
    }
}
