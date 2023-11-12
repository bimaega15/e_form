@if (isset($metodePembayaran))
<form method="post" action="{{ url('master/metodePembayaran/'.$metodePembayaran->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.metodePembayaran.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Metode Pembayaran</label>
                <input type="text" class="form-control" name="nama_metode_pembayaran" placeholder="Metode Pembayaran..." value="{{ isset($metodePembayaran) ? $metodePembayaran->nama_metode_pembayaran : '' }}">
            </div>
        </x-modal.modal-body>

        <x-modal.modal-footer>
            <div class="form-group d-flex">
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary w-20" id="btn_submit">
                    Submit
                </button>
            </div>
        </x-modal.modal-footer>
    </form>

    <script type="text/javascript" src="{{ asset('js/master/metodePembayaran/form.js') }}"></script>