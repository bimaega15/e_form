<form method="post" action="{{ route('transaksi.forwardApproval') }}" id="form-submit-approvel">
    <x-modal.modal-body>
        <input type="hidden" name="transaction_id" value="{{ $getTransaction->id }}">
        <div class="col-span-12 sm:col-span-12 mb-2">
            <ul class="nav nav-link-tabs" role="tablist">
                <li id="approval_users" class="nav-item flex-1" role="presentation">
                    <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#approval" type="button" role="tab" aria-controls="approval" aria-selected="true"> APPROVAL ATASAN </button>
                </li>
                <li id="history_pengajuan" class="nav-item flex-1" role="presentation">
                    <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#pengajuan" type="button" role="tab" aria-controls="pengajuan" aria-selected="false"> HISTORY APPROVAL </button>
                </li>
            </ul>
            <div class="tab-content mt-5">
                <div id="approval" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="approval_users">
                    @include('one.transaksi.partials_approval.approval')
                </div>

                <div id="pengajuan" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="history_pengajuan">
                    @include('one.transaksi.partials_approval.history')
                </div>
            </div>
        </div>

    </x-modal.modal-body>

    <x-modal.modal-footer>
        @if (
($getTransaction->users->profile->jabatan->nama_jabatan != 'Direktur' && $getTransaction->users->profile->jabatan->nama_jabatan != 'Direktur Jenderal') && UtilsHelp::myProfile($getTransaction->users_id_review)->profile->jabatan->nama_jabatan != 'Direktur' &&$getTransaction->status_transaction != 'direvisi'
)
        <div class="form-group d-flex">
            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                Cancel
            </button>
            <button type="button" class="btn btn-primary w-20" id="btn_submit_approvel">
                Submit
            </button>
        </div>
        @endif
    </x-modal.modal-footer>
</form>

<script type="text/javascript" src="{{ asset('js/transaksi/form.js') }}"></script>
<script class="url_root" data-url="{{ url('/') }}"></script>