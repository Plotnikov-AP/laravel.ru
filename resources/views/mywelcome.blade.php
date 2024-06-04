<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/styles.css') }}">
	<!-- <link type="text/css" rel="stylesheet" href="/styles/main.css" /> -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>
    <title>My Welcome</title>
</head>
<body onload="clockTimer();">
<div class="div-count">
    <x-my-clock />
    <x-my-counter />
</div>
<div class="menu">
    <x-my-menu />
</div> 

   
</body>
</html>