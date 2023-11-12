<x-backend-layout>
    @section('title','Menu Page')
    <!-- BEGIN: Top Bar -->
    @section('breadcrumbs')
    {{ Breadcrumbs::render('menu') }}
    @endsection
    <!-- END: Top Bar -->

    <h2 class="intro-y text-lg font-medium mt-10">
        Data Menu
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2 btn-add" data-url="{{ route('master.menu.create') }}">Tambah Data</button>
        </div>


        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div id="output_tree"></div>
        </div>
        <!-- END: Data List -->
    </div>


    @push('custom_js')
    <script class="url_rendermenu" data-url="{{ route('master.menu.index') }}"></script>
    <script class="url_sortandnested" data-url="{{ route('master.menu.index') }}"></script>
    <script src="{{ asset('js/master/menu/index.js') }}"></script>
    @endpush
</x-backend-layout>