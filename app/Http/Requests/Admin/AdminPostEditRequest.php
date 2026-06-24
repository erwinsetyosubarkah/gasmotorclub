<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPostEditRequest extends FormRequest
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
            'title'         => 'required|min:5',
            'category_id'   => 'required',
            'slug'          => 'required|min:5',
            'body'          => 'required',
            'post_image'    => 'image|file|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'Judul wajib diisi',
            'title.min'             => 'Judul minimal 5 karakter',
            'category_id.required'  => 'Kategori wajib diisi',
            'slug.required'         => 'Slug wajib diisi',
            'slug.min'              => 'Slug minimal 5 karakter',
            'body.required'         => 'Body wajib diisi',
            'post_image.image'      => 'Foto wajib berjenis image',
            'post_image.file'       => 'Foto wajib berjenis file',
            'post_image.max'        => 'Foto maksimal berukuran 2 Mb'
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
