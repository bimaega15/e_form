<x-backend-layout>
    @section('title','Settings Page')
    @section('title','Settings Controller')
    <!-- BEGIN: Top Bar -->
    @section('breadcrumbs')
    {{ Breadcrumbs::render('settings') }}
    @endsection
    <!-- END: Top Bar -->

    <h2 class="intro-y text-lg font-medium mt-10">
        Data Settings
    </h2>
    @if ($settings != null)
    <form method="post" action="{{ url('setting/settings/'.$settings->id.'?_method=put') }}" id="form-submit">
        @else
        <form method="post" action="{{ route('setting.settings.store') }}" id="form-submit">
            @endif
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-12 mb-2">
                    <div id="link-tab" class="p-5">
                        <div class="preview">
                            <ul class="nav nav-link-tabs" role="tablist">
                                <li id="pengaturan_umum_tab" class="nav-item flex-1" role="presentation">
                                    <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#pengaturan_umum" type="button" role="tab" aria-controls="pengaturan_umum" aria-selected="true"> PENGATURAN UMUM </button>
                                </li>
                                <li id="pengaturan_email_tab" class="nav-item flex-1" role="presentation">
                                    <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#pengaturan_email" type="button" role="tab" aria-controls="pengaturan_email" aria-selected="false"> PENGATURAN EMAIL </button>
                                </li>
                            </ul>
                            <div class="tab-content mt-5">
                                <div id="pengaturan_umum" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="pengaturan_umum_tab">
                                    @include('setting::settings.partials.umum')
                                </div>

                                <div id="pengaturan_email" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="pengaturan_email_tab">
                                    @include('setting::settings.partials.email')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span12 mb-2">
                    <div class="flex justify-end">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-primary w-20" id="btn_submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>


        @push('custom_js')
        <script class="url_datastatis_zonawaktu" data-url="{{ route('master.dataStatis.parentStatis') }}" data-jenisreferensi_datastatis="zona_waktu"></script>
        <script class="url_settings" data-url="{{ route('setting.settings.checkData') }}"></script>
        <script class="url_root" data-url="{{ url('/') }}"></script>
        <script class="zona_waktu" data-zonawaktu_settings_id="{{ isset($zonawaktu_settings) ? $zonawaktu_settings->id : '' }}" data-zonawaktu_settings_nama="{{ isset($zonawaktu_settings) ? $zonawaktu_settings->nama_datastatis : '' }}"></script>
        <script src="{{ asset('js/setting/settings/index.js') }}"></script>
        @endpush
</x-backend-layout>