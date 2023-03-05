<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset("/assets/fonts/icomoon/style.css")}}">

    <link rel="stylesheet" href="{{asset("/assets/css/owl.carousel.min.css")}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("/assets/css/bootstrap.min.css")}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset("/assets/css/style.css")}}">
</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{asset("/assets/js/jquery-3.3.1.min.js")}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset("/assets/js/popper.min.js")}}"></script>
    <script src="{{asset("/assets/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("/assets/js/main.js")}}"></script>
</body>
</html>
