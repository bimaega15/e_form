@if (isset($transaction))
<form method="post" action="{{ url('transaksi/'.$transaction->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('transaksi.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <input type="hidden" name="id" value="{{ isset($transaction) ? $transaction->id : '' }}">
            <div class="col-span-12 sm:col-span-12 mb-2">
                <ul class="nav nav-link-tabs" role="tablist">
                    <li id="pengajuan_transaksi" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#transaksi" type="button" role="tab" aria-controls="transaksi" aria-selected="true"> PENGAJUAN PRODUCT </button>
                    </li>
                    <li id="detail_product" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false"> DETAIL PRODUCT </button>
                    </li>
                    <li id="overbooking" class="nav-item flex-1 hidden" role="presentation">
                        <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#overbooking_tab" type="button" role="tab" aria-controls="overbooking_tab" aria-selected="false"> OVER BOOKING </button>
                    </li>
                </ul>
                <div class="tab-content mt-5">
                    <div id="transaksi" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="pengajuan_transaksi">
                        @include('one.transaksi.partials.pengajuan')
                    </div>

                    <div id="product" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="detail_product">
                        @include('one.transaksi.partials.product')
                    </div>

                    <div id="overbooking_tab" class="tab-pane leading-relaxed hidden" role="tabpanel" aria-labelledby="overbooking">
                        @include('one.transaksi.partials.overbooking')
                    </div>
                </div>
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

    <script type="text/javascript" src="{{ asset('js/transaksi/form.js') }}"></script>
    <script class="data_id" data-id="{{ isset($transaction) ? $transaction->id : '' }}" data-overbooking_transaction="{{ isset($transaction) ? $transaction->overbooking_transaction : '' }}"></script>
    <script class=" url_root" data-url="{{ url('/') }}"></script>