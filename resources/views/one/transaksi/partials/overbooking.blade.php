<div class="col-span-12 sm:col-span-12 mb-2">
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-12 mb-2">
            <label for="" class="form-label">Jenis Over Booking</label>
            <select name="jenis_over_booking" id="" class="form-select select2" style="width: 100%;">
                <option value="">-- Pilih Jenis Over Booking --</option>
                @foreach ($jenisOverBooking as $key => $item)
                <option value="{{ $item }}" {{ isset($transaction) ? @$transaction->overBooking->jenis_over_booking == $item ? 'selected' : '' : '' }}>
                    {{$item}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-span-6 mb-2">
            <label for="" class="form-label">Dari Nomor Rekening</label>
            <input name="darirekening_booking" type="number" class="form-control" value="{{ isset($transaction) ?@ $transaction->overBooking->darirekening_booking : '' }}" placeholder="Dari Nomor Rekening...">
        </div>
        <div class="col-span-6 mb-2">
            <label for="" class="form-label">Nama Pemilik Rekening</label>
            <input name="pemilikrekening_booking" type="text" class="form-control" value="{{ isset($transaction) ? @$transaction->overBooking->pemilikrekening_booking : '' }}" placeholder="Nama Pemilik Rekening...">
        </div>
        <div class="col-span-6 mb-2">
            <label for="" class="form-label">Nomor Rekening Tujuan</label>
            <input name="tujuanrekening_booking" type="number" class="form-control" value="{{ isset($transaction) ? @$transaction->overBooking->tujuanrekening_booking : '' }}" placeholder="Nomor Rekening Tujuan...">
        </div>
        <div class="col-span-6 mb-2">
            <label for="" class="form-label">Nama Pemilik Rekening</label>
            <input name="pemiliktujuan_booking" type="text" class="form-control" value="{{ isset($transaction) ? @$transaction->overBooking->pemiliktujuan_booking : '' }}" placeholder="Nama Pemilik Rekening...">
        </div>
        <div class="col-span-12 mb-2">
            <label for="" class="form-label">Nominal Booking</label>
            <input name="nominal_booking" id="nominal_booking" type="text" class="form-control" value="{{ isset($transaction) ? @$transaction->overBooking->nominal_booking : '' }}" placeholder="Nominal...">
        </div>
    </div>
</div>