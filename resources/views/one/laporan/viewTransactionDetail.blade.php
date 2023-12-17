<x-modal.modal-body>
    <div class="intro-y col-span-12 overflow-auto">
        <table style="width: 100%;" class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                    <th>Remarks</th>
                    <th>Mata Uang</th>
                    <th>Kurs</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalRp = 0;
                @endphp
                @foreach ($getTransactionRequest as $item)
                @php
                $totalRp += $item->subtotal_detail;
                @endphp
                <tr>
                    <td class="text-center">{{ $item->transaction->code_transaction }}</td>
                    <td class="text-center">{{ $item->products->name_product }}</td>
                    <td class="text-center">{{ $item->qty_detail }}</td>
                    <td class="text-center">Rp {{ number_format($item->price_detail, 0,',','.') }},-</td>
                    <td class="text-center">Rp {{ number_format($item->subtotal_detail,0,',','.') }},-</td>
                    <td class="text-center">{{ $item->remarks_detail }}</td>
                    <td class="text-center">{{ $item->matauang_detail }}</td>
                    <td class="text-center">{{ $item->kurs_detail }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;"> Total Rp. </td>
                    <td style="text-align: right; font-weight: bold;">{{ number_format($totalRp,0,',','.') }},-</td>
                </tr>
            </tfoot>
        </table>
    </div>

</x-modal.modal-body>

<x-modal.modal-footer>
    <div class="form-group d-flex">
        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
            OK
        </button>
    </div>
</x-modal.modal-footer>