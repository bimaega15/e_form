@if (isset($permissions))
<form method="post" action="{{ url('autentikasi/permissions/'.$permissions->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('autentikasi.permissions.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="form-group">
                <label for="name">Nama permissions</label>
                <input type="text" class="form-control" id="name" placeholder="Nama Permissions..." name="name" value="{{ isset($permissions) ? $permissions->name : '' }}">
            </div>
        </x-modal.modal-body>

        <x-modal.modal-footer>
            <div class="form-group d-flex">
                <button type="button" class="btn btn-secondary d-flex align-items-center justify-content-center mr-2" data-dismiss="modal">
                    <i class="zmdi zmdi-close mr-1"></i> Close
                </button>
                <button type="submit" class="btn btn-primary mr-2" id="btn_submit"><i class="zmdi zmdi-mail-send mr-1"></i>
                    Simpan</button>
            </div>
        </x-modal.modal-footer>
    </form>

    <script type="text/javascript" src="{{ asset('js/autentikasi/permissions/form.js') }}"></script>