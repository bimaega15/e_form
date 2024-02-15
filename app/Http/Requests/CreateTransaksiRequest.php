<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransaksiRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code_transaction' => 'required|unique:transaction,code_transaction,' . request('id'),
            'tanggal_transaction' => 'required',
            'metode_pembayaran_id' => 'required',
            'expired_transaction' => 'required',
            'purpose_transaction' => 'required',
            'attachment_transaction' => 'max:2048',

            // 'products_id' => 'required',
            // 'qty_detail' => 'required',
            // 'subtotal_detail' => 'required',
            // 'price_detail' => 'required',
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
            'code_transaction.required' => 'Kode transaksi wajib diisi',
            'code_transaction.unique' => 'Kode transaksi harus unik',
            'tanggal_transaction.required' => 'Tanggal transaksi wajib diisi',
            'metode_pembayaran_id.required' => 'Metode pembayaran wajib diisi',
            'expired_transaction.required' => 'Tanggal expired wajib diisi',
            'purpose_transaction.required' => 'Tujuan transaksi wajib diisi',
            'attachment_transaction.max' => 'Maximal file 2mb berupa gambar',

            // 'products_id.required' => 'Produk wajib diisi',
            // 'qty_detail.required' => 'Qty wajib diisi',
            // 'subtotal_detail.required' => 'Sub total wajib diisi',
            // 'price_detail.required' => 'Harga detail wajib diisi',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
