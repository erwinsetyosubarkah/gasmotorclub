<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelIndexRequest extends FormRequest
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
            'search'  => 'string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'search.string'     => 'Keyword pencarian wajib string',
            'name.max'          => 'Keyword pencarian terlalu panjang, maksimal 255 karakter.'
        ];
    }
}
