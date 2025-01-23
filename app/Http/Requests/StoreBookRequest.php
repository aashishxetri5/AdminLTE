<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            "title" => ucwords(trim($this->title)),
            "description" => ucfirst(trim($this->description)),
            "stock" => (int) $this->stock,
            "status" => (boolean) $this->status,
        ]);
        // dd($this->all());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            // "author_id" => ["required", "numeric"],
            // "genre_id" => ["required", "numeric"],
            "stock" => ["required", "numeric", "min:0"],
            "status" => ["required"],
            "cover" => ["required", "image", "mimes:jpeg,png,jpg", "max:1024"],
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Title cannot be empty",
            "title.string" => "Title must be a string",
            "description.required" => "Description cannot be empty",
            "description.string" => "Description must be a string",
            // "author_id.required" => "Author cannot be empty",
            // "author_id.numeric" => "Invalid author",
            // "genre_id.required" => "Genre cannot be empty",
            // "genre_id.numeric" => "Invalid genre",
            "stock.required" => "Stock cannot be empty",
            "stock.int" => "Stock must be an integer",
            "stock.min" => "Stock must be greater than or equal to 0",
            "status.required" => "status cannot be empty",
            "cover.required" => "Cover image cannot be empty",
            "cover.image" => "Cover image must be an image",
            "cover.mimes" => "Cover image must be a jpeg, png, or jpg file",
            "cover.max" => "Cover image must not be greater than 1MB",
        ];
    }
}
