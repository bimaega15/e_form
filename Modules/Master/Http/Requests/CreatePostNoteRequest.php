<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostNoteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul_notes' => 'required',
            'keterangan_notes' => 'required',
            'tanggal_notes' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'judul_notes.required' => 'Judul wajib diisi',
            'keterangan_notes.required' => 'Keterangan wajib diisi',
            'tanggal_notes.required' => 'Tanggal wajib diisi',
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
