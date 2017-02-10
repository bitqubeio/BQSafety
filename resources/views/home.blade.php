@extends('layouts.main')

@section('content')
    <section id="main">
        <div id="error">
            <div class="text-center">
                <img src="{{ url('/bqsafety/img/user.png') }}" alt="" style="width: 100px">
                <h2 class="mt-3">¡Bienvenido(a), {{ Auth::user()->user_username }}!</h2>
                @if(Auth::user()->user_status)
                    <p>Saludos. </p>
                @else
                    <p>En breve el administrador del sistema validara su registro. </p>
                @endif
            </div>
        </div>
    </section>
@endsection
