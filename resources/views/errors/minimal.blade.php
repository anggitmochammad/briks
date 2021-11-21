
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('assets/plugins/global/plugins.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/pages/error/error-61894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    </head>
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        @yield('code')
        @yield('message')

        <script src="{{ asset('assets/plugins/global/plugins.bundle1894.js?v=7.1.9') }}"></script>
        <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle1894.js?v=7.1.9') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle1894.js?v=7.1.9') }}"></script>
    </body>
</html>
