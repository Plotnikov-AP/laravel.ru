<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/pyatnashki.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/js/myjs.js') }}"></script>
    <script src="/js/functions.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>
<body onload="onloadd()";>
    <div id="header">
        <div class="display_flex">
            Это тестовый сайт Плотникова Александра на LARAVEL 11.14.0
            @include('layouts.my-login')
            <!-- @include('components.my_buttom_ru_en') -->
        </div>
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