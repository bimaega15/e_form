<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">
        <div>
            Diajukan Oleh <span class="text-primary" style="cursor: pointer;" data-tw-toggle="modal" data-tw-target="#modal-detail-pengajuan">{{ $getTransaction->users->profile->nama_profile }} [{{ $getTransaction->users->profile->jabatan->nama_jabatan }}]</span>
        </div>
        <div>
            Tanggal: {{ UtilsHelp::formatDate($getTransaction->tanggal_transaction) }}
        </div>

        @if (
        ($getTransaction->users->profile->jabatan->nama_jabatan == 'Direktur' || $getTransaction->users->profile->jabatan->nama_jabatan == 'Direktur Jenderal') || UtilsHelp::getCheckJabatan($getTransaction->users_id_review) || $getTransaction->status_transaction == 'direvisi'
        )
        <div>
            <strong class="text-info">Approval: </strong>
            <button class="d-inline-block btn btn-sm btn-primary btn-confirm-approvel mr-2" data-url="{{ route('transaksi.finishApproval') }}" data-transaction_id="{{ $getTransaction->id }}" data-type="disetujui" data-tw-toggle="modal" data-tw-target="#modal-approvel"><i class="fas fa-sticky-note"></i>&nbsp; Selesaikan Approval</button>

            <button class="d-inline-block btn btn-sm btn-danger btn-confirm-approvel mr-2" data-url="{{ route('transaksi.finishApproval') }}" data-transaction_id="{{ $getTransaction->id }}" data-type="ditolak" data-tw-toggle="modal" data-tw-target="#modal-approvel"><i class="fas fa-sticky-note"></i>&nbsp; Tolak Approval</button>

            <button class="d-inline-block btn btn-sm btn-dark btn-confirm-approvel mr-2" data-url="{{ route('transaksi.finishApproval') }}" data-transaction_id="{{ $getTransaction->id }}" data-type="direvisi" data-tw-toggle="modal" data-tw-target="#modal-approvel"><i class="fas fa-sticky-note"></i>&nbsp; Revisi</button>
        </div>
        @endif


        @include('one.transaksi.partials_approval.modalDetail')

        @include('one.transaksi.partials_approval.modalApproval')
    </label>
</div>

@if (
($getTransaction->users->profile->jabatan->nama_jabatan != 'Direktur' && $getTransaction->users->profile->jabatan->nama_jabatan != 'Direktur Jenderal') && UtilsHelp::myProfile($getTransaction->users_id_review)->profile->jabatan->nama_jabatan != 'Direktur' && $getTransaction->status_transaction != 'direvisi')
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Diteruskan Oleh {{ $setJabatan }}</label>
    <select name="users_id_forward" id="" class="form-select select2ServerSide" style="width: 100%;" data-url="{{ route('setting.users.getUsersProfile') }}" data-transaction_id="{{ $getTransaction->id }}">
        <option value="">-- Pilih Atasan --</option>
    </select>
</div>

<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Keterangan</label>
    <textarea class="form-control" name="keterangan_approvel" placeholder="Keterangan..." rows="5"></textarea>
</div>
@endif