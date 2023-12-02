<div class="col-span-12 sm:col-span-12 mb-2">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-6 mb-2">
            <label for="" class="form-label">List Product</label>
            <select name="products_id" id="" class="form-select select2 products_id" style="width: 100%;">
                <option value="">-- Pilih Products --</option>
                @foreach ($product as $item)
                <option value="{{ $item->id }}">
                    [{{$item->code_product}}] {{$item->name_product}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-span-6 mb-2 mt-6">
            <label for="" class="form-label"></label>
            <button type="button" class="btn btn-primary btn-confirm"><i class="fas fa-check"></i> &nbsp; OK</button>
        </div>
    </div>
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">CODE</th>
                        <th class="whitespace-nowrap">NAMA</th>
                        <th class="whitespace-nowrap">KAPASITAS</th>
                        <th class="whitespace-nowrap">QTY</th>
                        <th class="whitespace-nowrap">HARGA</th>
                        <th class="whitespace-nowrap">SUB TOTAL</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody id="onLoadTbody">
                    @if(isset($transaction))
                    @foreach ($transaction->transactionDetail as $index => $item)
                    <tr class="row_data" data-id="{{ $item->products->id }}">
                        <th class="whitespace-nowrap">{{ $item->products->code_product }}</th>
                        <th class="whitespace-nowrap">{{ $item->products->name_product }}</th>
                        <th class="whitespace-nowrap">{{ $item->products->capacity_product }}</th>
                        <th class="whitespace-nowrap">
                            <input type="number" class="form-control quantity_product" placeholder="Qty" name="quantity_product" value="{{ $item->qty_detail }}" />
                        </th>
                        <th class="whitespace-nowrap">
                            <input type="number" class="form-control price_product" placeholder="Harga Product" name="price_product" value="{{ $item->price_detail }}" />
                        </th>
                        <th class="whitespace-nowrap">
                            <input type="number" class="form-control subtotal_product" placeholder="Sub Total Product" name="subtotal_product" value="{{ $item->subtotal_detail }}" />
                        </th>
                        <th class="text-center whitespace-nowrap">
                            <button type="button" class="btn-delete-row_data btn btn-danger btn-sm" data-id="{{ $item->products->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </th>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>