<x-backend-layout>
    @section('title', 'Dashboard page')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Laporan Pengajuan
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="mail" class="report-box__icon text-info"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalWaiting"></div>
                                    <div class="text-base text-slate-500 mt-1">Menunggu approval</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user-check" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalSuccess"></div>
                                    <div class="text-base text-slate-500 mt-1">Disetujui</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="x" class="report-box__icon text-danger"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalReject"></div>
                                    <div class="text-base text-slate-500 mt-1">Ditolak</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="send" class="report-box__icon text-info"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalTransaction"></div>
                                    <div class="text-base text-slate-500 mt-1">Total Pengajuan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="mail" class="report-box__icon text-info"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalWaitingAccesor"></div>
                                    <div class="text-base text-slate-500 mt-1">Accesor Approval</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user-check" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalSuccessAccesor"></div>
                                    <div class="text-base text-slate-500 mt-1">Accesor Disetujui</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="x" class="report-box__icon text-danger"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalRejectAccesor"></div>
                                    <div class="text-base text-slate-500 mt-1">Accesor Ditolak</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="send" class="report-box__icon text-info"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 text-right totalTransactionAccesor"></div>
                                    <div class="text-base text-slate-500 mt-1">Total Pengajuan Accesor</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <div class="col-span-12 lg:col-span-12 mt-8">
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">
                                Catatan
                            </h2>
                        </div>
                        <div class="mt-5 intro-x">
                            <div id="output_notes"></div>
                        </div>
                    </div>
                </div>

                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-12 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Laporan Transaction
                        </h2>
                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                            <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                            <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                        </div>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div class="report-chart">
                            <div class="h-[275px]">
                                <canvas id="report-transactionpermonth-chart" class="mt-6 -mb-6"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 col-span-12">
                    <div class="col-span-12 lg:col-span-8 mt-8">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Laporan Expired
                            </h2>
                            <!-- <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                            <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                            <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                        </div> -->
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5 overflow-auto">
                            <div class="flex justify-end items-center mb-5">
                                <a class="btn btn-primary" href="{{ route('laporan.index') }}"> Lihat Laporan</a>
                            </div>
                            <table class="table table-report -mt-2" id="dataTableExpired">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">Code</th>
                                        <th class="whitespace-nowrap">MENGAJUKAN</th>
                                        <th class="whitespace-nowrap">TANGGAL PENGAJUAN</th>
                                        <th class="whitespace-nowrap">TANGGAL KADALUARSA</th>
                                        <th class="whitespace-nowrap">TOTAL TRANSAKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
                    <!-- BEGIN: Weekly Top Seller -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-4 mt-8">
                        <div class="grid grid-cols-12 gap-6 col-span-12">
                            <div class="col-span-12 sm:col-span-12 lg:col-span-12 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Data Pengajuan
                                    </h2>
                                </div>
                                <div class="intro-y box p-5 mt-5">
                                    <div class="mt-3">
                                        <div class="h-[275px]">
                                            <canvas id="report-transaction-chart"></canvas>
                                        </div>
                                    </div>
                                    <div class="w-52 sm:w-auto mx-auto mt-8">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                            <span class="truncate">Menunggu</span> <span class="font-medium ml-auto waiting_grafik"></span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                            <span class="truncate">Disetujui</span> <span class="font-medium ml-auto agree_grafik"></span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                            <span class="truncate">Ditolak</span> <span class="font-medium ml-auto reject_grafik"></span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 rounded-full mr-3" style="background-color: rgb(21, 67, 176);"></div>
                                            <span class="truncate">Accesor Aprovel</span> <span class="font-medium ml-auto waiting_accesor_grafik"></span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 rounded-full mr-3" style="background-color: rgb(196, 19, 168);"></div>
                                            <span class="truncate">Disetujui Accesor</span> <span class="font-medium ml-auto agree_accesor_grafik"></span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 rounded-full mr-3" style="background-color: rgb(255, 75, 75);"></div>
                                            <span class="truncate">Ditolak Accesor</span> <span class="font-medium ml-auto reject_accesor_grafik"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Weekly Top Seller -->
                            <!-- BEGIN: Sales Report -->
                            <div class="col-span-12 sm:col-span-12 lg:col-span-12 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Total Pegawai
                                    </h2>
                                </div>
                                <div class="intro-y box p-5 mt-5">
                                    <div class="mt-3">
                                        <div class="h-[213px]">
                                            <canvas id="report-employee-chart"></canvas>
                                        </div>
                                    </div>
                                    <div class="w-52 sm:w-auto mx-auto mt-8">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                            <span class="truncate">Laki-laki</span> <span class="font-medium ml-auto male-presentase"></span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                            <span class="truncate">Perempuan</span> <span class="font-medium ml-auto female-presentase"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
                    <!-- BEGIN: Official Store -->
                </div>
            </div>
        </div>
    </div>
    @push('custom_js')
    <script class="url_root" data-url="{{ url('/') }}"></script>
    <script class="datatable_expired" data-url="{{ route('dashboard.expired') }}"></script>
    <script src="{{ asset('js/dashboard/index.js') }}"></script>
    @endpush
</x-backend-layout>