<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code_product' => 'required|unique:products,code_product,' . request('id'),
            'name_product' => 'required',
            'type_product_id' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'code_product.required' => 'Code product wajib diisi',
            'code_product.unique' => 'Code product sudah dimiliki',
            'name_product.required' => 'Nama product wajib diisi',
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
