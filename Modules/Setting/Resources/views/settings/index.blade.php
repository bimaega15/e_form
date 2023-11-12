<x-backend-layout>
    @section('title','Settings Page')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Settings Page
                        <small class="text-muted">Management Data Settings</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    {{ Breadcrumbs::render('settings') }}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="header">
                            <h2><strong>Form Settings</strong>
                                <small>
                                    Data Settings
                                </small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            @if ($settings != null)
                            <form method="post" action="{{ url('master/settings/'.$settings->id.'?_method=put') }}" id="form-submit">
                                @else
                                <form method="post" action="{{ route('master.settings.store') }}" id="form-submit">
                                    @endif
                                    <x-modal.modal-body>

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#general_setting"> <i class="zmdi zmdi-home"></i> PENGATURAN UMUM </a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#email_setting">
                                                    <i class="zmdi zmdi-email"></i> PENGATURAN EMAIL
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane in active" id="general_setting">
                                                @include('master::settings.partials.umum')
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="email_setting">
                                                @include('master::settings.partials.email')
                                            </div>
                                        </div>
                                    </x-modal.modal-body>

                                    <x-modal.modal-footer>
                                        <div class="form-group d-flex">
                                            <button type="reset" class="btn btn-secondary d-flex align-items-center justify-content-center mr-2" data-dismiss="modal">
                                                <i class="zmdi zmdi-close mr-1"></i> Close
                                            </button>
                                            <button type="submit" class="btn btn-primary mr-2" id="btn_submit"><i class="zmdi zmdi-mail-send mr-1"></i>
                                                Simpan</button>
                                        </div>
                                    </x-modal.modal-footer>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('custom_js')
    <script class="url_datastatis_zonawaktu" data-url="{{ route('master.dataStatis.parentStatis') }}" data-jenisreferensi_datastatis="zona_waktu"></script>
    <script class="url_settings" data-url="{{ route('master.settings.checkData') }}"></script>
    <script class="url_root" data-url="{{ url('/') }}"></script>
    <script class="zona_waktu" data-zonawaktu_settings_id="{{ isset($zonawaktu_settings) ? $zonawaktu_settings->id : '' }}" data-zonawaktu_settings_nama="{{ isset($zonawaktu_settings) ? $zonawaktu_settings->nama_datastatis : '' }}"></script>
    <script src="{{ asset('js/master/settings/index.js') }}"></script>
    @endpush
</x-backend-layout>