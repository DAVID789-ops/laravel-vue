<?php

namespace App\Http\Requests\Contact;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [


            'name' => 'required|min:3|max:255',
            'phone' => 'required|min:10|max:50',
            'avatar' => 'nullable|mimes:jpg,jpeg,png|max:2048', // valida imágenes opcionales
            'privacity' => 'required|in:publico,privado',
        ];
    }
}
