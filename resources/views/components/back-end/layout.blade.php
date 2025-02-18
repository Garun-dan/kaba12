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
    <title>kaba12 | {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('default/logo/favication.svg') }}" type="image/x-icon">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('plugin/icons/css/all.min.css') }}">
    <script src="{{ asset('plugin/icons/js/all.min.js') }}"></script>

    {{-- Jquery --}}
    <script src="{{ asset('plugin/jquery/jquery.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('plugin/sweetalert/alert.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugin/sweetalert/alert.css') }}">

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('tema/style.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/backend/web-backend-style.css') }}">
</head>

<body>
    <x-backend.modals></x-backend.modals>
    <div class="grid-body">
        <x-backend.left-sidebar></x-backend.left-sidebar>
        <div class="grid-main">
            <x-backend.topbar></x-backend.topbar>
            <main>
                {{ $slot }}
            </main>
            <x-backend.footer></x-backend.footer>
        </div>
        <x-backend.right-sidebar></x-backend.right-sidebar>
    </div>

    {{-- Main JS --}}
    <script src="{{ asset('tema/backend/web-bakcend-script.js') }}"></script>
</body>

</html>
