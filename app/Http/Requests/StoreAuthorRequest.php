<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            "name" => trim($this->input("name")),
            "email" => trim($this->input("email")),
        ]);
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

    public function messages(): array
    {
        return [
            "fullname.required" => "Author's full name is required.",
            "fullname.string" => "Author's full name must be a string.",
            "fullname.max" => "Author's full name must not exceed 255 characters.",
            "email.required" => "Author's email is required.",
            "email.email" => "Author's email must be a valid email address.",
            "email.max" => "Author's email must not exceed 255 characters.",
        ];
    }
}
