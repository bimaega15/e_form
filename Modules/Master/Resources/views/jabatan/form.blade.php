@if (isset($jabatan))
<form method="post" action="{{ url('master/jabatan/'.$jabatan->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.jabatan.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" name="nama_jabatan" placeholder="Nama Jabatan..." value="{{ isset($jabatan) ? $jabatan->nama_jabatan : '' }}">
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

    <script type="text/javascript" src="{{ asset('js/master/jabatan/form.js') }}"></script>