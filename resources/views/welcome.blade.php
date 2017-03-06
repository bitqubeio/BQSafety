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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <title>BQSafety — SEGURIDAD INDUSTRIAL</title>
    <!-- Favicon -->
    {{ Html::favicon('bqsafety/img/logo/bqsafety.png') }}
    {{ Html::style('bqsafety/libs/bootstrap/css/bootstrap.css') }}
    {{ Html::style('https://fonts.googleapis.com/css?family=Work+Sans:400,600') }}
    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }

        button {
            cursor: pointer;
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            transform: translate(-50%, -60%);
        }

        @media (max-height: 638px) {
            video {
                transform: translate(-50%, -70%);
            }
        }

        @media (max-height: 1080) {
            video {
                transform: translate(-50%, -58%);
            }
        }

        .cover {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ url('bqsafety/img/cover.png') }}');
            z-index: -90;
        }

        .logo {
            width: 350px;
            margin: 0 auto;
        }

        .btn{
            border: 1px solid transparent;
            border-radius: 2px;
        }

        .btn-register {
            background-color: #1289AB;
            border-color: #1289AB;
            color: #fff;
        }

        .btn-register:hover {
            background-color: #157693;
            border-color: #D8EAFA;
            color: #fff;
        }

        .btn-login {
            background-color: #08A563;
            border-color: #08A563;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #067446;
            border-color: #D8EAFA;
            color: #fff;
        }

        #polina {
            max-width: 350px;
            margin: 2rem auto;
            color: white;
            padding: 0;
            text-align: center;
        }

        h1 {
            font-size: 3.5rem;
        }
    </style>
</head>

<body>
<video poster="{{ url('bqsafety/img/cover.webp') }}" id="bgvid" playsinline autoplay muted loop>
    <source src="{{ url('bqsafety/img/safety.mp4') }}" type="video/webm">
</video>
<div class="cover"></div>
<div id="polina">
    <img class="logo" src="{{ url('bqsafety/img/logo/bqsafety_letter_white.png') }}" alt="">

    @if (Route::has('login'))
        @if (Auth::check())
            <a href="{{ url('/home') }}" class="btn btn-login mt-5">Bienvenido, {{ Auth::user()->user_username }}</a>
        @else
        <a href="{{ url('/login') }}" class="btn btn-login mt-5">Acceder</a>
        <a href="{{ url('/register') }}" class="btn btn-register mt-5">Registrarse</a>
        @endif
    @endif

</div>
</body>

</html>