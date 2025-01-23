<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGenreRequest extends FormRequest
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
            "name" => ["required", "string", "max:255"],
            "description" => ["required", "string"],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Genre is required",
            "name.string" => "Genre must be a string",
            "name.max" => "Genre must not exceed 255 characters",
            "description.required" => "Description is required",
            "description.string" => "Description must be a string",
        ];
    }
}
