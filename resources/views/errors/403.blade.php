@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-3">Error 403!</h1>
            <p class="lead">Usted no está autorizado para ver este recurso.</p>
            <p><a class="btn btn-lg btn-success" href="#" role="button" onclick="goBack()">Regresar a BQSafety</a></p>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection