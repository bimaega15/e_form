<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostMenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_menu' => 'required',
            'link_menu' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'nama_menu.required' => 'Menu wajib diisi',
            'link_menu.required' => 'Link wajib diisi',
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
