<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('backend') }}/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>@yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/app.css" />
    <!-- END: CSS Assets-->

    <link href="{{ asset('plugins/nestable/jquery-nestable.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('library/select2-develop/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2-bootstrap-theme-master/dist/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/') }}/DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('library/photoviewer-master/dist/photoviewer.min.css') }}">
    <style>
        .my-popup-class {
            z-index: 10001;
        }
    </style>
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
    <!-- BEGIN: Mobile Menu -->
    <x-partials.mobile></x-partials.mobile>
    <!-- END: Mobile Menu -->
    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <x-partials.navbar></x-partials.navbar>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <x-partials.topbar></x-partials.topbar>
            <!-- END: Top Bar -->
            {{ $slot }}
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <x-partials.darkMode></x-partials.darkMode>

    <x-modal.modal-small />
    <x-modal.modal-medium />
    <x-modal.modal-large />
    <x-modal.modal-extra-large />
    <x-modal.modal-logout />
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('backend/') }}/developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="{{ asset('backend') }}/dist/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- END: JS Assets-->

    <script src="{{ asset('plugins/nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('plugins/js/pages/ui/sortable-nestable.js') }}"></script>
    <script src="{{ asset('library/select2-develop/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('library/') }}/DataTables/datatables.min.js"></script>
    <script src="{{ asset('library/photoviewer-master/dist/photoviewer.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('custom_js')
</body>

</html>