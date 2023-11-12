@if (isset($menu))
<form method="post" action="{{ url('master/menu/'.$menu->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.menu.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-6 mb-2">
                <label for="" class="form-label">
                    Apakah Menu ini induk ?
                </label> <br>
                <input type="checkbox" name="is_node" id="is_node" class="form-checkbox h-5 w-5 text-blue-600" value="1" {{ isset($menu) ? $menu->is_node != null ? 'checked' : '' : '' }}>
                <label for="is_node" class="ml-2 text-gray-700">
                    Iya
                </label>
            </div>
            <div class="col-span-12 sm:col-span-6 mb-2">
                <label for="" class="form-label">
                    Apakah Menu ini sebagai children ?
                </label>
                <br>
                <input type="checkbox" name="is_children" id="is_children" class="form-checkbox h-5 w-5 text-blue-600" value="1" {{ isset($menu) ? $menu->is_children != null ? 'checked' : '' : '' }}>
                <label for="is_children" class="ml-2 text-gray-700">
                    Iya
                </label>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2 {{ isset($menu) ? $menu->is_children != null || $menu->is_children == 1  ? '' : 'hidden' : 'hidden' }}" id="form-menu_root_id">
                <label for="" class="form-label">Daftar Menu</label>
                <select name="menu_root" id="" class="form-select select2" style="width: 100%;">
                    <option value="">-- Pilih Daftar Menu --</option>
                    @foreach ($daftarMenu as $item)
                    <option value="{{ $item->id }}" {{ isset($menu) ? $menu->is_children != null || $menu->is_children == 1  ? $menuRootId != null ? $menuRootId->id == $item->id ? 'selected' : '' : '' : '' : '' }}>{{ $item->nama_menu }}| [{{$item->link_menu}}]</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-12 sm:col-span-12 mb-2 {{ isset($menu) ? $menu->is_node != null || $menu->is_node == 1  ? '' : 'hidden' : '' }}" id="form-menu_children_id">
                <label for="" class="form-label">List Management Menu</label>
                <div class="overflow-x-auto">
                    <table class="table" id="tableListMenu">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">No.</th>
                                <th class="whitespace-nowrap">Nama Menu</th>
                                <th class="whitespace-nowrap">Icon</th>
                                <th class="whitespace-nowrap">Link</th>
                                <th class="whitespace-nowrap">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" name="nama_menu" placeholder="Nama menu..." value="{{ isset($menu) ? $menu->nama_menu : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Icon</label>
                <input type="text" class="form-control" name="icon_menu" placeholder="Icon menu..." value="{{ isset($menu) ? $menu->icon_menu : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Link</label>
                <input type="text" class="form-control" name="link_menu" placeholder="Link menu..." value="{{ isset($menu) ? $menu->link_menu : '' }}">
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

    <script class="url_datatable" data-url="{{ route('master.menu.dataTable') }}"></script>
    <script class="data_datatable" data-table="{{ isset($menu) ? $menu->children_menu != null ? ($menuChildren) : '' : '' }}"></script>
    <script type="text/javascript" src="{{ asset('js/master/menu/form.js') }}"></script>