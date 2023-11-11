@if (isset($dataStatis))
<form method="post" action="{{ url('master/dataStatis/'.$dataStatis->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.dataStatis.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="form-group">
                <label for="kode_datastatis">Kode</label>
                <input type="text" class="form-control" id="kode_datastatis" placeholder="Kode..." name="kode_datastatis" value="{{ isset($dataStatis) ? $dataStatis->kode_datastatis : '' }}">
            </div>
            <div class="form-group">
                <label for="nama_datastatis">Nama Statis</label>
                <input type="text" class="form-control" id="nama_datastatis" placeholder="Nama Statis..." name="nama_datastatis" value="{{ isset($dataStatis) ? $dataStatis->nama_datastatis : '' }}">
            </div>
            <div class="form-group">
                <label for="jenisreferensi_datastatis">Jenis Referensi</label>
                <select name="jenisreferensi_datastatis" class="form-control select2" id="" style="width: 100%;">
                    <option value="">-- Jenis Referensi --</option>
                    @foreach ($jenisReferensi as $value => $item)
                    <option value="{{ $value }}" {{ isset($dataStatis) ? $dataStatis->jenisreferensi_datastatis == $value ? 'selected' : '' : '' }}>{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="parentid_datastatis">Parent Id</label>
                <select name="parentid_datastatis" class="form-control select2Server" id="" style="width: 100%;">
                    <option value="">-- Parent ID --</option>
                </select>
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

    <script class="url_parent_id" data-parent_id="{{ isset($parentStatis) ? $parentStatis->parentid_datastatis : '' }}" data-parent_name="{{ isset($parentStatis) ? $parentStatis->nama_datastatis : '' }}"></script>

    <script type="text/javascript" src="{{ asset('js/master/dataStatis/form.js') }}"></script>