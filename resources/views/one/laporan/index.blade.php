<x-backend-layout>
    @section('title','Laporan Page')
    <!-- BEGIN: Top Bar -->
    @section('breadcrumbs')
    {{ Breadcrumbs::render('laporan') }}
    @endsection
    <!-- END: Top Bar -->

    <h2 class="intro-y text-lg font-medium mt-10">
        Data Laporan
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5 box p-3">
        <div class="intro-y col-span-4">
            <label for="" class="form-label">Periode Transaksi</label>
            <input name="periode_transaksi" type="text" data-daterange="true" class="datepicker form-control block">
        </div>
        <div class="intro-y col-span-2">
            <label>Transaksi Expired</label>
            <div class="mt-2">
                <div class="form-check form-switch">
                    <input name="is_transaksi_expired" id="transaksi_expired" class="form-check-input" type="checkbox">
                    <label class="form-check-label" for="transaksi_expired">Tampilkan</label>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-1">
            <label for="" class="form-label"></label>
            <button type="button" class="btn btn-primary mt-5 btn-filter">Filter</button>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto">
            <table class="table table-report -mt-2" id="dataTable">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NO.</th>
                        <th class="whitespace-nowrap">MENGAJUKAN</th>
                        <th class="whitespace-nowrap">STATUS</th>
                        <th class="whitespace-nowrap">OLEH</th>
                        <th class="whitespace-nowrap">CODE</th>
                        <th class="whitespace-nowrap">TANGGAL PENGAJUAN</th>
                        <th class="whitespace-nowrap">TANGGAL KADALUARSA</th>
                        <th class="whitespace-nowrap">PAYMENT TERMS</th>
                        <th class="whitespace-nowrap">METODE PEMBAYARAN</th>
                        <th class="whitespace-nowrap">TOTAL PRODUCT</th>
                        <th class="whitespace-nowrap">TOTAL TRANSAKSI</th>
                        <th class="whitespace-nowrap">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

    </div>


    @push('custom_js')
    <script class="url_datatable" data-url="{{ route('laporan.index') }}"></script>
    <script class="url_root" data-url="{{ url('/') }}"></script>
    <script src="{{ asset('js/laporan/index.js') }}"></script>
    @endpush
</x-backend-layout>