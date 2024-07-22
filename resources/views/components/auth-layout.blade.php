<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('backend') }}/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>@yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="#" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6"
                        src="{{ asset('backend') }}/dist/images/logo.svg">
                    <span class="text-white text-lg ml-3"> Tinker </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('backend') }}/dist/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Beberapa langkah untuk
                        <br>
                        masuk ke dalam akun kamu
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Aplikasi untuk
                        manajement pengajuan (E-Form)</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            {{ $slot }}
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="login-dark-login.html"
        class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div>
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('backend') }}/dist/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- END: JS Assets-->

    @stack('custom_js')
</body>

</html>
