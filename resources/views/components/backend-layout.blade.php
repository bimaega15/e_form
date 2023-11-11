<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/templateBackend/template/') }}/assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/templateBackend/template/') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/templateBackend/template/') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('backend/templateBackend/template/') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/templateBackend/template/') }}/assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/templateBackend/template/') }}/assets/images/favicon.png" />
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <x-partials.sidebar></x-partials.sidebar>
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            <x-partials.navbar></x-partials.navbar>
            <!-- partial -->

            <div class="page-content">
                {{ $slot }}
            </div>

            <!-- partial:partials/_footer.html -->
            <x-partials.footer></x-partials.footer>
            <!-- partial -->

        </div>

        <x-modal.modal-small />
        <x-modal.modal-extra-large />
        <x-modal.modal-large />
        <x-modal.modal-logout />
        <x-modal.modal-medium />
    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/core/core.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/js/template.js"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('backend/templateBackend/template/') }}/assets/js/datepicker.js"></script>
    <!-- end custom js for this page -->
</body>

</html>