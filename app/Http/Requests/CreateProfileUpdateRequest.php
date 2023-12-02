<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nik_profile' => 'required|unique:profile,nik_profile,' . request('id'),
            'nama_profile' => 'required',
            'email_profile' => 'required|unique:profile,email_profile,' . request('id'),
            'nohp_profile' => 'required',
            'jeniskelamin_profile' => 'required',
            'gambar_profile' => 'image|max:2048'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function messages()
    {
        return [
            'nik_profile.required' => 'NIK wajib diisi',
            'nik_profile.unique' => 'NIK harus unik',
            'nama_profile.required' => 'Nama wajib diisi',
            'email_profile.required' => 'Email wajib diisi',
            'email_profile.unique' => 'Email harus unik',
            'nohp_profile.required' => 'No Handphone harus unik',
            'jeniskelamin_profile.required' => 'Jenis kelamin harus unik',
            'gambar_profile.image' => 'Wajib berupa gambar',
            'gambar_profile.max' => 'Ukuran gambar maksimal 2048mb',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
