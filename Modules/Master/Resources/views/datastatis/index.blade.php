<x-backend-layout>
    @section('title','Data Statis Page')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Data Statis Page
                        <small class="text-muted">Management Data Data Statis</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10 btn-add" type="button" data-url="{{ route('master.dataStatis.create') }}">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    {{ Breadcrumbs::render('dataStatis') }}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="header">
                            <h2><strong>Data Table Data Statis</strong>
                                <small>
                                    List Data Table Data Statis
                                </small>
                            </h2>
                        </div>
                        <div class="body table-responsive">

                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>KODE</th>
                                        <th>NAMA DATA</th>
                                        <th>JENIS REFERENSI</th>
                                        <th>PARENT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('custom_js')
    <script class="url_datatable" data-url="{{ route('master.dataStatis.index') }}"></script>
    <script class="url_datastatis" data-url="{{ route('master.dataStatis.parentStatis') }}"></script>

    <script src="{{ asset('js/master/dataStatis/index.js') }}"></script>
    @endpush
</x-backend-layout>