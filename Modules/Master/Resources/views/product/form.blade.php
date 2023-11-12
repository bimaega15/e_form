@if (isset($unit))
<form method="post" action="{{ url('master/unit/'.$unit->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.unit.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Nama unit</label>
                <input type="text" class="form-control" name="nama_unit" placeholder="Nama unit..." value="{{ isset($unit) ? $unit->nama_unit : '' }}">
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

    <script type="text/javascript" src="{{ asset('js/master/unit/form.js') }}"></script>