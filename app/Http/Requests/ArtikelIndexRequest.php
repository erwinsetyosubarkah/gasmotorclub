<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use RealRashid\SweetAlert\Facades\Alert;

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

    protected function failedValidation(Validator $validator)
    {
        // 1. Ambil semua error dan gabungkan kalimatnya
        $allErrors = implode('<br>', $validator->errors()->all());

        // 2. Set notifikasi SweetAlert ke Session
        Alert::html('Validasi Gagal!', $allErrors, 'error');

        // 3. Lanjutkan redirect back bawaan Laravel dengan membawa error instansi
        throw new HttpResponseException(
            redirect()->back()->withInput()->withErrors($validator)
        );
    }
}
