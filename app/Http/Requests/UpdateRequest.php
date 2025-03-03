<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            "firstname" => ["required", "regex:/[a-zA-Z]+$/"],
            "lastname" => ["required", "regex:/[a-zA-Z]+$/"],
            "username" => ["required"],
            "city" => ["required"],
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'The first name is required',
            'firstname.regex' => 'The first name can only contain letters',
            'lastname.required' => 'The last name is required',
            'lastname.regex' => 'The last name can only contain letters',
            'username.required' => 'The username is required',
            'city.required' => 'The city is required',
        ];
    }
}
