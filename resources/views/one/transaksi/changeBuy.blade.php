@if ($metode_pembayaran == 'transfer')
<div class="col-span-6 mb-2 no-cash">
    <label for="" class="form-label">Rekening Penerima</label>
    <input name="accept_transaction" type="text" class="form-control" value="" placeholder="Rekening penerima...">
</div>
<div class="col-span-6 mb-2 no-cash">
    <label for="" class="form-label">Bank Penerima</label>
    <select name="bank_transaction" id="" class="form-select select2">
        <option value="">-- Bank Penerima --</option>
        @foreach ($bankPenerima as $item)
        <option value="{{ $item->nama_datastatis }}">{{ $item->nama_datastatis }}</option>
        @endforeach
    </select>
</div>
@endif

@if ($metode_pembayaran == 'virtual account')
<div class="col-span-6 mb-2 no-cash">
    <label for="" class="form-label">Nomor Virtual Account</label>
    <input name="nomorvirtual_transaction" type="number" class="form-control" value="" placeholder="Nomor Virtual Account...">
</div>
<div class="col-span-6 mb-2 no-cash">
    <label for="" class="form-label">Bank Penerima</label>
    <select name="bank_transaction" id="" class="form-select select2">
        <option value="">-- Bank Penerima --</option>
        @foreach ($bankPenerima as $item)
        <option value="{{ $item->nama_datastatis }}">{{ $item->nama_datastatis }}</option>
        @endforeach
    </select>
</div>
@endif