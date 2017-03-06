<!DOCTYPE html>
<html lang="es">
<head>

    <!--


        888      d8b 888                      888                   d8b
        888      Y8P 888                      888                   Y8P
        888          888                      888
        88888b.  888 888888  .d88888 888  888 88888b.   .d88b.      888  .d88b.
        888 "88b 888 888    d88" 888 888  888 888 "88b d8P  Y8b     888 d88""88b
        888  888 888 888    888  888 888  888 888  888 88888888     888 888  888
        888 d88P 888 Y88b.  Y88b 888 Y88b 888 888 d88P Y8b.     d8b 888 Y88..88P
        88888P"  888  "Y888  "Y88888  "Y88888 88888P"   "Y8888  Y8P 888  "Y88P"
                                 888
                                 888
                                 888

    -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
    {{ Html::favicon('bqsafety/img/logo/bqsafety.png') }}
    <!-- Styles -->
    {{ Html::style('bqsafety/libs/bootstrap/css/bootstrap.css') }}
    {{ Html::style('bqsafety/css/main.css') }}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    @yield('content')
</body>
</html>
