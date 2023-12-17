@if (isset($notes))
<form method="post" action="{{ url('master/notes/'.$notes->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.notes.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal_notes" placeholder="Tanggal notes..." value="{{ isset($notes) ? $notes->tanggal_notes : date('Y-m-d') }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul_notes" placeholder="Judul..." value="{{ isset($notes) ? $notes->judul_notes : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan_notes" placeholder="Keterangan...">{{ isset($notes) ? $notes->keterangan_notes : '' }}</textarea>
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

    <script type="text/javascript" src="{{ asset('js/master/notes/form.js') }}"></script>