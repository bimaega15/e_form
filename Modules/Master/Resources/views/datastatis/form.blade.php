@if (isset($dataStatis))
<form method="post" action="{{ url('master/dataStatis/'.$dataStatis->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.dataStatis.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Kode</label>
                <input type="text" class="form-control" name="kode_datastatis" placeholder="Kode..." value="{{ isset($dataStatis) ? $dataStatis->kode_datastatis : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Nama Statis</label>
                <input type="text" class="form-control" name="nama_datastatis" placeholder="Nama Statis..." value="{{ isset($dataStatis) ? $dataStatis->nama_datastatis : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Jenis Referensi</label>
                <select name="jenisreferensi_datastatis" id="" class="form-select select2" style="width: 100%;">
                    <option value="">-- Jenis Referensi --</option>
                    @foreach ($jenisReferensi as $value => $item)
                    <option value="{{ $value }}" {{ isset($dataStatis) ? $dataStatis->jenisreferensi_datastatis == $value ? 'selected' : '' : '' }}>
                        {{$item}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Parent Id</label>
                <select name="parentid_datastatis" id="" class="form-select select2Server" style="width: 100%;">
                    <option value="">-- Parent ID --</option>
                </select>
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

    <script class="url_parent_id" data-parent_id="{{ isset($parentStatis) ? $parentStatis->parentid_datastatis : '' }}" data-parent_name="{{ isset($parentStatis) ? $parentStatis->nama_datastatis : '' }}"></script>

    <script type="text/javascript" src="{{ asset('js/master/dataStatis/form.js') }}"></script>