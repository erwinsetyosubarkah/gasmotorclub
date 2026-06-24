<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPostStoreRequest extends FormRequest
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
            'title'  => 'required|min:5',
            'category_id' => 'required',
            'slug' => 'required|min:5|unique:posts',
            'body' => 'required',
            'post_image' => 'image|file|max:2048|required'
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
            'slug.unique'           => 'Slug harus merupakan objek post',
            'body.required'         => 'Body wajib diisi',
            'post_image.image'      => 'Foto wajib berjenis image',
            'post_image.file'       => 'Foto wajib berjenis file',
            'post_image.max'        => 'Foto maksimal berukuran 2 Mb',
            'post_image.required'   => 'Foto wajib diisi'
        ];
    }
}
