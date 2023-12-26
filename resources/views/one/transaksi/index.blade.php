<x-backend-layout>
    @section('title','Transaksi Page')
    <!-- BEGIN: Top Bar -->
    @section('breadcrumbs')
    {{ Breadcrumbs::render('transaction') }}
    @endsection
    <!-- END: Top Bar -->

    <h2 class="intro-y text-lg font-medium mt-10">
        Data Transaksi
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2 btn-add" data-url="{{ route('transaksi.create') }}">Tambah Data</button>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto">
            <div class="flex justify-end items-center">
                <span style="width: 15px; height: 15px; background-color: #FFA1D7; margin-right: 10px; border-radius: 5px;"></span> <strong> Pengajuan Expired </strong>
            </div>
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
    <script class="url_datatable" data-url="{{ route('transaksi.index') }}"></script>
    <script class="url_root" data-url="{{ url('/') }}"></script>
    <script src="{{ asset('js/transaksi/index.js') }}"></script>
    @endpush
</x-backend-layout>