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

    <title>@yield('title','Inicio') — {{ config('app.name', 'BITQUBE') }}</title>

    <!-- Favicon -->
    {{ Html::favicon('bqsafety/img/user.png') }}

    <!-- Libs Styles -->
    {{ Html::style('bqsafety/libs/bootstrap/css/bootstrap.css') }}
    {{ Html::style('bqsafety/libs/fontawesome/css/font-awesome.min.css') }}

    <!-- Toastr -->
    {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}

    <!-- Datatables -->
    {{ Html::style('bqsafety/libs/datatables/css/jquery.dataTable.bootstrap4.css') }}
    {{ Html::style('https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css') }}

    <!-- Datepicker Files -->
    {{ Html::style('bqsafety/libs/datePicker/css/bootstrap-datepicker3.css') }}
    {{ Html::style('bqsafety/libs/datePicker/css/bootstrap-datepicker.standalone.css') }}

    <!-- Global style -->
    {{ Html::style('bqsafety/css/main.css') }}

    <!-- summernote -->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <!--
    <div id="bqsafety-loader">
        <img src="bqsafety/img/logo.png" alt="Safety Loader">
    </div>
    -->

    <!-- Sidebar top -->
    @include('layouts.includes.navbar')

    <!-- Sidebar -->
    @include('layouts.includes.sidebar')


    <!-- Content -->
    @yield('content')

    <!-- Libs scripts -->
    {{ Html::script('bqsafety/libs/jquery/jquery.min.js') }}
    {{ Html::script('bqsafety/libs/datatables/js/jquery.dataTables.min.js') }}
    {{ Html::script('bqsafety/libs/datatables/js/jquery.datatable.bootstrap4.js') }}
    {{ Html::script('https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js') }}
    {{ Html::script('bqsafety/libs/bootstrap/js/tether.min.js') }}
    {{ Html::script('bqsafety/libs/bootstrap/js/bootstrap.min.js') }}
    {{ Html::script('bqsafety/js/bootstrap-filestyle.js') }}

    <!-- Datepicker Files -->
    {{ Html::script('bqsafety/libs/datePicker/js/bootstrap-datepicker.js') }}
    <!-- Language -->
    {{ Html::script('bqsafety/libs/datePicker/locales/bootstrap-datepicker.es.min.js') }}

    <!-- Charts -->
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js') }}

    <!-- Global script -->
    {{ Html::script('bqsafety/js/global.js') }}

    <!-- Toastr -->
    {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}
    {!! Toastr::render() !!}

    <!-- Scripts sections -->
    @section('javascript')
    @show

</body>
</html>
