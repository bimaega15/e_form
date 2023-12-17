<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">CODE</label>
    <input type="text" class="form-control" name="code_transaction" placeholder="Kode Transaksi..." value="{{ isset($transaction) ? $transaction->code_transaction : UtilsHelp::autoNumberTransaction() }}">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Tanggal Pengajuan</label>
    <input type="date" name="tanggal_transaction" type="text" class="datepicker form-control" value="{{ isset($transaction) ? $transaction->tanggal_transaction : date('Y-m-d') }}" placeholder="Tanggal pengajuan">
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
<div id="output_metode_pembayaran" class="grid grid-cols-12 gap-6">
    @if (isset($transaction))
    @if ($transaction->accept_transaction != null)
    <div class="col-span-6 mb-2">
        <label for="" class="form-label">Rekening Penerima</label>
        <input name="accept_transaction" type="text" class="form-control" value="{{ isset($transaction) ? $transaction->accept_transaction : '' }}" placeholder="Rekening penerima...">
    </div>
    <div class="col-span-6 mb-2">
        <label for="" class="form-label">Bank Penerima</label>
        <select name="bank_transaction" id="" class="form-select select2">
            <option value="">-- Bank Penerima --</option>
            @foreach ($bankPenerima as $item)
            <option value="{{ $item->nama_datastatis }}" {{ isset($transaction) ? $transaction->bank_transaction == $item->nama_datastatis ? 'selected' : '' : '' }}>{{ $item->nama_datastatis }}</option>
            @endforeach
        </select>
    </div>
    @endif
    @endif

    @if (isset($transaction))
    @if ($transaction->nomorvirtual_transaction != null)
    <div class="col-span-6 mb-2">
        <label for="" class="form-label">Nomor Virtual Account</label>
        <input name="nomorvirtual_transaction" type="number" class="form-control" value="{{ isset($transaction) ? $transaction->nomorvirtual_transaction : '' }}" placeholder="Nomor Virtual Account...">
    </div>
    <div class="col-span-6 mb-2">
        <label for="" class="form-label">Bank Penerima</label>
        <select name="bank_transaction" id="" class="form-select select2">
            <option value="">-- Bank Penerima --</option>
            @foreach ($bankPenerima as $item)
            <option value="{{ $item->nama_datastatis }}" {{ isset($transaction) ? $transaction->bank_transaction == $item->nama_datastatis ? 'selected' : '' : '' }}>{{ $item->nama_datastatis }}</option>
            @endforeach
        </select>
    </div>
    @endif
    @endif
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Tanggal Expired</label>
    <input type="date" name="expired_transaction" type="text" class="datepicker form-control" value="{{ isset($transaction) ? $transaction->expired_transaction : date('Y-m-d') }}" placeholder="Tanggal expired">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Tujuan Transaksi</label>
    <input name="purpose_transaction" type="text" class="form-control" value="{{ isset($transaction) ? $transaction->purpose_transaction : '' }}" placeholder="Tujuan transaksi...">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Purpose (Divisi)</label>
    <input name="purposedivisi_transaction" type="text" class="form-control" value="{{ isset($transaction) ? $transaction->purposedivisi_transaction : '' }}" placeholder="Purpose (Divisi)...">
</div>
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-6 mb-2">
        <label for="" class="form-label">PPN</label>
        <label for="" class="form-label">
            Apakah include PPN ?
        </label> <br>
        <input type="checkbox" name="isppn_transaction" id="isppn_transaction" class="form-checkbox h-5 w-5 text-blue-600" value="1" {{ isset($transaction) ? $transaction->isppn_transaction != null ? 'checked' : '' : '' }}>
        <label for="isppn_transaction" class="ml-2 text-gray-700">
            Iya
        </label>
    </div>
    <div class="col-span-6 mb-2">
        <label for="" class="form-label">Persen (%) PPN</label>
        <input name="valueppn_transaction" type="number" class="form-control" value="{{ isset($transaction) ? $transaction->valueppn_transaction : '' }}" placeholder="Nilai PPN (%)..." readonly min="0" max="100">
    </div>
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Attachment</label>
    <input type="file" class="form-control" name="attachment_transaction">
    @if (isset($transaction))
    @if ($transaction != null)
    <div id="load_attachment_transaction">
        <a class="photoviewer" href="{{ asset('upload/transaction/'.$transaction->attachment_transaction) }}" data-gallery="photoviewer" data-title="{{ $transaction->attachment_transaction }}" target="_blank">
            <img src="{{ asset('upload/transaction/'.$transaction->attachment_transaction) }}" alt="Upload File" height="100px" class="rounded">
        </a>
    </div>
    @endif
    @endif
</div>