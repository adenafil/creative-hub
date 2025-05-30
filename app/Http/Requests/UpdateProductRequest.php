<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'cover' => 'file|mimes:jpeg,png,jpg|max:5120',
            'path_file' => 'file|mimes:zip,gz|max:16384',
            'name' => 'required|string', // Corrected syntax
            'price' => 'required|numeric|min:0', // Corrected syntax
            'category_id' => 'required|string|in:ebook,font,icon,template,ui kit',
            'about' => 'required|string',
        ];
    }
}
