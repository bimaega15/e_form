<!DOCTYPE html>
<html lang="id">

<head>
    <title>{{ UtilsHelp::settingApp()->nama_settings }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/') }}/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/') }}/vendors/images/32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/') }}/vendors/images/16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/') }}/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/') }}/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/') }}/vendors/styles/style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    {{$slot}}
</body>

<script src="{{ asset('frontend') }}/vendors/scripts/core.js"></script>
<script src="{{ asset('frontend') }}/vendors/scripts/script.min.js"></script>
<script src="{{ asset('frontend') }}/vendors/scripts/process.js"></script>
<script src="{{ asset('frontend') }}/vendors/scripts/layout-settings.js"></script>

</html>