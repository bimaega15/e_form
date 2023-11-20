<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nik_profile' => 'required|unique:profile,nik_profile',
            'nama_profile' => 'required',
            'email_profile' => 'required|unique:profile,email_profile',
            'nohp_profile' => 'required',
            'jeniskelamin_profile' => 'required',
            'gambar_profile' => 'image|max:2048',
            'password' => "required",
            'password_confirm' => 'same:password',
            'alamat_profile' => 'required',
            'code_profile' => 'required|unique:profile,code_profile',
            'jabatan_id' => 'required',
            'unit_id' => 'required',
            'category_office_id' => 'required',
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
            'password.required' => 'Password wajib diisi',
            'nik_profile.required' => 'NIK wajib diisi',
            'nik_profile.unique' => 'NIK harus unik',
            'nama_profile.required' => 'Nama wajib diisi',
            'email_profile.required' => 'Email wajib diisi',
            'email_profile.unique' => 'Email harus unik',
            'nohp_profile.required' => 'No Handphone wajib diisi',
            'jeniskelamin_profile.required' => 'Jenis kelamin wajib diisi',
            'gambar_profile.image' => 'Wajib berupa gambar',
            'gambar_profile.max' => 'Ukuran gambar maksimal 2048mb',
            'password_confirm.same' => "Konfirmasi password tidak sama",
            'alamat_profile.required' => "Alamat profile wajib diisi",

            'code_profile.required' => 'Code profile wajib diisi',
            'code_profile.unique' => 'Code profile harus unik',
            'jabatan_id.required' => 'Jabatan wajib diisi',
            'unit_id.required' => 'Unit wajib diisi',
            'category_office_id.required' => 'Kategori Office wajib diisi',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
