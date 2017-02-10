@extends('layouts.main')

@section('content')
    <section id="main">
        <div id="error">
            <div class="text-center">
                <img src="{{ url('/bqsafety/img/error.png') }}" alt="" class="error-img">
                <h2 class="mt-3">¡Acceso denegado!</h2>
                <p>Usted no tiene permisos requeridos para ingresar a esta parte del sistema. </p>
                <p>Contacte con el administrador.</p>
                <p><a class="btn btn-sm btn-create" href="#" role="button" onclick="goBack()">← Regresar a BQSafety</a></p>
            </div>
        </div>
    </section>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection