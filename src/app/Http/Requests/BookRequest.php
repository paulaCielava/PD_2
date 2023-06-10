<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            'name' => 'required|min:3|max:256',
            'razotajs_id' => 'required',
            'categorie_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'

        ];
    }

    public function messages()
    {
        return [
        'required' => 'Lauks ":attribute" ir obligāts',
        'min' => 'Laukam ":attribute" jābūt vismaz :min simbolus garam',
        'max' => 'Lauks ":attribute" nedrīkst būt garāks par :max simboliem',
        'boolean' => 'Lauka ":attribute" vērtībai jābūt "true" vai "false"',
        'unique' => 'Šāda lauka ":attribute" vērtība jau ir reģistrēta',
        'numeric' => 'Lauka ":attribute" vērtībai jābūt skaitlim',
        'image' => 'Laukā ":attribute" jāpievieno korekts attēla fails',
    ];
    }
    public function attributes()
    {
        return [
            'name' => 'nosaukums',
            'razotajs_id' => 'razotajs',
            'categorie_id' => 'kategorija',
            'description' => 'apraksts',
            'price' => 'cena',
            'year' => 'gads',
            'image' => 'attēls',
            'display' => 'publicēt',
        ];
    }


}
