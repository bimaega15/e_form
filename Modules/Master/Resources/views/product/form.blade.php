@if (isset($product))
<form method="post" action="{{ url('master/product/'.$product->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('master.product.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Kode</label>
                <input type="text" class="form-control" name="code_product" placeholder="Kode..." value="{{ isset($product) ? $product->code_product : '' }}" readonly>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name_product" placeholder="Nama produk..." value="{{ isset($product) ? $product->name_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Kapasitas</label>
                <input type="text" class="form-control" name="capacity_product" placeholder="Kapasitas..." value="{{ isset($product) ? $product->capacity_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Spesifikasi</label>
                <input type="text" class="form-control" name="specification_product" placeholder="Spesifikasi..." value="{{ isset($product) ? $product->specification_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Tipe Produk</label>
                <select name="type_product_id" id="" class="form-select select2" style="width: 100%;">
                    <option value="">-- Pilih Tipe Produk --</option>
                    @foreach ($typeProduct as $item)
                    <option value="{{ $item->id }}" {{ isset($product) ? $product->type_product_id == $item->id ? 'selected' : '' : '' }}>
                        {{$item->nama_type_product}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity_product" placeholder="Quantity..." value="{{ isset($product) ? $product->quantity_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Unit Goods</label>
                <input type="text" class="form-control" name="unit_goods_product" placeholder="Unit Goods..." value="{{ isset($product) ? $product->unit_goods_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Size</label>
                <input type="text" class="form-control" name="size_product" placeholder="Size Product..." value="{{ isset($product) ? $product->size_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Gross</label>
                <input type="text" class="form-control" name="gross_product" placeholder="Gross Product..." value="{{ isset($product) ? $product->gross_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Net</label>
                <input type="text" class="form-control" name="net_product" placeholder="Net Product..." value="{{ isset($product) ? $product->net_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Unit Size</label>
                <input type="text" class="form-control" name="unit_size_product" placeholder="Unit Size..." value="{{ isset($product) ? $product->unit_size_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Gross Uom</label>
                <input type="text" class="form-control" name="gross_uom_product" placeholder="Gross Uom..." value="{{ isset($product) ? $product->gross_uom_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Net Uom</label>
                <input type="text" class="form-control" name="net_uom_product" placeholder="Net Uom..." value="{{ isset($product) ? $product->net_uom_product : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar_product">
                @if (isset($product))
                @if ($product != null)
                <div id="load_gambar_product">
                    <a class="photoviewer" href="{{ asset('upload/product/'.$product->gambar_product) }}" data-gallery="photoviewer" data-title="{{ $product->gambar_product }}" target="_blank">
                        <img src="{{ asset('upload/product/'.$product->gambar_product) }}" alt="Upload gambar" height="50px" class="rounded">
                    </a>
                </div>
                @endif
                @endif
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

    <script class="get_auto_code" data-url="{{ route('master.product.getAutoCode') }}"></script>
    <script type="text/javascript" src="{{ asset('js/master/product/form.js') }}"></script>