@if (isset($menu))
<form method="post" action="{{ url('master/menu/'.$menu->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.menu.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="form-group">
                <label for="nama_menu">Nama Menu</label>
                <input type="text" class="form-control" id="nama_menu" placeholder="Nama menu..." name="nama_menu" value="{{ isset($menu) ? $menu->nama_menu : '' }}">
            </div>
            <div class="form-group">
                <label for="icon_menu">Icon</label>
                <input type="text" class="form-control" id="icon_menu" placeholder="Icon..." name="icon_menu" value="{{ isset($menu) ? $menu->icon_menu : '' }}">
            </div>
            <div class="form-group">
                <label for="link_menu">Link</label>
                <input type="text" class="form-control" id="link_menu" placeholder="Link..." name="link_menu" value="{{ isset($menu) ? $menu->link_menu : '' }}">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Apakah Menu ini induk?</label> <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_node" name="is_node" {{ isset($menu) ? $menu->is_node != null ? 'checked' : '' : '' }}>
                            <label class="form-check-label" for="is_node">
                                Iya
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Apakah Menu ini sebagai children ?</label> <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_children" name="is_children" {{ isset($menu) ? $menu->is_children != null ? 'checked' : '' : '' }}>
                            <label class="form-check-label" for="is_children">
                                Iya
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="form-group {{ isset($menu) ? $menu->is_node != null || $menu->is_node == 1  ? '' : 'd-none' : '' }}" id="form-menu_children_id">
                <label for="">List Management Menu</label>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tableListMenu">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Menu</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group  {{ isset($menu) ? $menu->is_children != null || $menu->is_children == 1  ? '' : 'd-none' : 'd-none' }}" id="form-menu_root_id">
                <label for="">Daftar Menu</label>
                <select name="menu_root" class="form-control select2" id="" style="width: 100%;">
                    <option value="">-- Pilih Daftar Menu --</option>
                    @foreach ($daftarMenu as $item)
                    <option value="{{ $item->id }}" {{ isset($menu) ? $menu->is_children != null || $menu->is_children == 1  ? $menuRootId != null ? $menuRootId->id == $item->id ? 'selected' : '' : '' : '' : '' }}>{{ $item->nama_menu }}| [{{$item->link_menu}}]</option>
                    @endforeach
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

    <script class="url_datatable" data-url="{{ route('master.menu.dataTable') }}"></script>
    <script class="data_datatable" data-table="{{ isset($menu) ? $menu->children_menu != null ? ($menuChildren) : '' : '' }}"></script>
    <script type="text/javascript" src="{{ asset('js/master/menu/form.js') }}"></script>