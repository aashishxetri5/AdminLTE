<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            "fullname" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255"],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array {
        return ([
            "fullname.required" => "Fullname is required.",
            "fullname.string" => "Fullname must be a string.",
            "fullname.max" => "Fullname must not be greater than 255 characters.",
            "email.required" => "Email is required.",
            "email.email" => "Email must be a valid email address.",
            "email.max" => "Email must not be greater than 255 characters.",
        ]);
    }
}
