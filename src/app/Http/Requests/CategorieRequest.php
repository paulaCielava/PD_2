<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'categorie' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Lauks ":attribute" ir obligāts',
        ];
    }
    public function attributes()
    {
        return [
            'categorie' => 'žanra nosaukums',
        ];
    }
}