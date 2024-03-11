<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostJobApplicationRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'job_category' => 'required',
            'years_experience' => 'required|numeric|min:0',
            'years_experience_role' => 'required|numeric|min:0',
            'notice_period' => 'required|string|in:Immediately,1 Month,2 Months,3 Months',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'password' => 'required',
            'agree_terms' => 'required|accepted',
        ];
    }
}
