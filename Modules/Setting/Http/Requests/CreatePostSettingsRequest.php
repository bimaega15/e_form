<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_settings' => 'required',
            'alamat_settings' => 'required',
            'nohp_settings' => 'required',
            'bahasa_settings' => 'required',
            'zonawaktu_settings' => 'required',
            'email_settings' => 'required',
            'longitude_settings' => 'required',
            'latitude_settings' => 'required',
            'logo_settings' => 'image|max:2048',
            'icon_settings' => 'image|max:2048',

            'setting_acountemail' => 'required',
            'setting_acountpassword' => 'required',
            'setting_namapengirim' => 'required',
            'setting_subject' => 'required',
            'setting_contentemail' => 'required',
            'setting_penutupemail' => 'required',
            'setting_copyright' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'logo_settings.image' => 'Logo Wajib berupa gambar',
            'logo_settings.max' => 'Size logo maximal 2048mb',
            'icon_settings.image' => 'Icon Wajib berupa gambar',
            'icon_settings.max' => 'Size icon maximal 2048mb',
            'nama_settings.required' => 'Nama perusahaan wajib diisi',
            'alamat_settings.required' => 'Alamat perusahaan wajib diisi',
            'nohp_settings.required' => 'No. Handphone perusahaan wajib diisi',
            'bahasa_settings.required' => 'Bahasa wajib diisi',
            'zonawaktu_settings.required' => 'Zona Waktu wajib diisi',
            'email_settings.required' => 'Email wajib diisi',
            'longitude_settings.required' => 'Longitude wajib diisi',
            'latitude_settings.required' => 'Longitude wajib diisi',

            'setting_acountemail.required' => 'Account email wajib diisi',
            'setting_acountpassword.required' => 'Account password wajib diisi',
            'setting_namapengirim.required' => 'Nama pengirim wajib diisi',
            'setting_subject.required' => 'Subejct wajib diisi',
            'setting_contentemail.required' => 'Content email wajib diisi',
            'setting_penutupemail.required' => 'Penutup email wajib diisi',
            'setting_copyright.required' => 'Copyright wajib diisi',
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
