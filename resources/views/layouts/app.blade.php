<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{ config('app.name') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://api.baddau.my.id/">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('vendor/assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('vendor/assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('vendor/assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('vendor/assets/css/oneui.min.css') }}">


    {{-- css:external --}}
    @stack('css-external')
    {{-- css:internal --}}
    @stack('css-internal')
</head>

<body>

    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <!-- Sidebar -->

        @include('layouts.components.sidebar')
        <!-- END Sidebar -->

        <!-- Header -->
        @include('layouts.components.header')
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="content">
                @yield('breadcrumbs')
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            @yield('content')
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('layouts.components.footer')
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('vendor/assets/js/oneui.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('vendor/assets/js/plugins/chart.js/chart.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('vendor/assets/js/pages/be_pages_dashboard.min.js') }}"></script>

    @stack('modal')
    @stack('javascript-external')
    @stack('javascript-internal')
</body>

</html>
