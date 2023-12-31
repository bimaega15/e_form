<x-modal.modal-body>
    @if ($getTransaction->overbooking_transaction != 1)
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
    @endif

    @if ($getTransaction->overbooking_transaction == 1)
    <div class="intro-y col-span-12 overflow-auto">
        <table style="width: 100%;" id="table-content" class="table">
            <tr>
                <td colspan="6" class="fontGeneral text-center font-bold" style="padding-bottom: 20px;">Overbooking Acccount</td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>:</td>
                <td colspan="4">{{ $getOverBooking->jenis_over_booking }}</td>
            </tr>
            <tr>
                <td>Dari Nomor Rekening</td>
                <td>:</td>
                <td>{{ $getOverBooking->darirekening_booking }}</td>
                <td>Nama Pemilik Rekening</td>
                <td>:</td>
                <td>{{ $getOverBooking->pemilikrekening_booking }}</td>
            </tr>
            <tr>
                <td>Nomor Rekening Tujuan</td>
                <td>:</td>
                <td>{{ $getOverBooking->tujuanrekening_booking }}</td>
                <td>Nama Pemilik Rekening</td>
                <td>:</td>
                <td>{{ $getOverBooking->pemiliktujuan_booking }}</td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>:</td>
                <td colspan="4">Rp. {{ number_format($getOverBooking->nominal_booking, 0,',','.') }}</td>
            </tr>
        </table>
    </div>
    @endif


</x-modal.modal-body>

<x-modal.modal-footer>
    <div class="form-group d-flex">
        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
            OK
        </button>
    </div>
</x-modal.modal-footer>