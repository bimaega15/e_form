<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">CODE</label>
    <input type="text" class="form-control" name="code_transaction" placeholder="Kode Transaksi..." value="{{ isset($transaction) ? $transaction->code_transaction : '' }}">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Tanggal Pengajuan</label>
    <input type="date" name="tanggal_transaction" type="text" class="datepicker form-control" value="{{ isset($transaction) ? $transaction->tanggal_transaction : '' }}" placeholder="Tanggal pengajuan">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Dibayarkan Kepada</label>
    <input type="text" class="form-control" name="paidto_transaction" placeholder="Dibayarkan kepada..." value="{{ isset($transaction) ? $transaction->paidto_transaction : '' }}">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Metode Pembayaran</label>
    <select name="metode_pembayaran_id" id="" class="form-select select2" style="width: 100%;">
        <option value="">-- Pilih Metode Pembayaran --</option>
        @foreach ($metodePembayaran as $item)
        <option value="{{ $item->id }}" {{ isset($transaction) ? $transaction->metode_pembayaran_id == $item->id ? 'selected' : '' : '' }}>
            {{$item->nama_metode_pembayaran}}
        </option>
        @endforeach
    </select>
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Tanggal Expired</label>
    <input type="date" name="expired_transaction" type="text" class="datepicker form-control" value="{{ isset($transaction) ? $transaction->expired_transaction : '' }}" placeholder="Tanggal expired">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Tujuan Transaksi</label>
    <input name="purpose_transaction" type="text" class="form-control" value="{{ isset($transaction) ? $transaction->purpose_transaction : '' }}" placeholder="Tujuan transaksi...">
</div>