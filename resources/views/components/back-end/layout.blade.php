<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kaba12 | Media Inspirasi Masa Kini">
    <meta name="keywords" content="berita, terkini, nasional, internasional, kaba12">
    <meta name="author" content="ARDERZ Technology">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title dan Favicon --}}
    <title>{{ $pengaturan->nama_web }} | {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset($pengaturan->favicon_web) }}" type="image/x-icon">

    {{-- Jquery --}}
    <script src="{{ asset('plugin/jquery/jquery.js') }}"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('plugin/icons/css/all.min.css') }}">
    <script src="{{ asset('plugin/icons/js/all.min.js') }}"></script>

    {{-- DataTable --}}
    <link rel="stylesheet" href="{{ asset('plugin/tabel/datatables.min.css') }}">
    <script src="{{ asset('plugin/tabel/datatables.min.js') }}"></script>

    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('plugin/sweetalert/alert.css') }}">
    <script src="{{ asset('plugin/sweetalert/alert.js') }}"></script>

    {{-- Handsontable --}}
    <script src="{{ asset('plugin/handsontabel/handsontable.full.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugin/handsontabel/handsontable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/handsontabel/ht-theme-main.min.css') }}">

    {{-- Chartjs --}}
    <script src="{{ asset('plugin/chart/chart.js') }}"></script>

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('tema/style.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/backend/web-backend-style.css') }}">
</head>

<body>
    <div id="success" data-success="{{ session('success') }}"></div>
    <div id="error" data-error="{{ session('error') }}"></div>
    <div id="warning" data-warning="{{ session('warning') }}"></div>

    <x-backend.modals></x-backend.modals>
    <div class="grid-body">
        <x-backend.left-sidebar :title="$title"></x-backend.left-sidebar>
        <div class="grid-main">
            <x-backend.topbar></x-backend.topbar>
            <main>
                {{ $slot }}
            </main>
            <x-backend.footer></x-backend.footer>
        </div>
        <x-backend.right-sidebar></x-backend.right-sidebar>
    </div>

    {{-- SweetAlert --}}
    <script src="{{ asset('plugin/sweetalert/flash.js') }}"></script>

    {{-- Main JS --}}
    <script src="{{ asset('tema/backend/web-bakcend-script.js') }}"></script>
</body>

</html>
