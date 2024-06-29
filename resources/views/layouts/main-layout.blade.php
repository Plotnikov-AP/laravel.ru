<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/js/myjs.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>
<body onload="onloadd()";>
    <div id="header">
        Это тестовый сайт Плотникова Александра на LARAVEL
        @include('layouts.my-login')
        <x-my-menu />
    </div>
    <div id="left-main">
        <div id="left">
            <x-my-clock />
            <x-my-counter />
            <x-goto-basket />
        </div>
        <div id="main">
            {{ $content }}
            <!-- <img src="myfonheader.webp" /> -->
            <x-modal-product-detail />
        </div>
    </div>
    <div id="footer">
        <x-my-menu />
    </div>
</body>
</html>