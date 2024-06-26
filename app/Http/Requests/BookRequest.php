<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|min:8|unique:books',
            'genre' => 'required',
            'language' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240',
            'picture' => 'required|file|mimes:png,jpg,jpeg',
            'description' => 'required|string|min:15',
        ];
    }
}
