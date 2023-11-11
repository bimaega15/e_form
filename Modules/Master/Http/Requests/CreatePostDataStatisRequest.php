<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostDataStatisRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_datastatis' => 'required',
            'jenisreferensi_datastatis' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'nama_datastatis.required' => 'Nama data statis wajib diisi',
            'jenisreferensi_datastatis.required' => 'Jenis referensi wajib diisi',
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
