<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'  => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'     => 'ID wajib diisi.',
        ];
    }
}
