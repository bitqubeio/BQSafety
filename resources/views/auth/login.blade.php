@extends('layouts.app')

@section('content')
    <section class="wraper">
        <div class="container">
            <div class="">
                <a href="http://www.bitqube.io" target="_blank" style="display: block; width: 51px; margin: 0 auto;">
                    <img src="bqsafety/img/bitqube.svg" alt="bitqube">
                </a>
                <div class="card">
                    <div class="card-block">
                        <a href="/" style="display: block;width: 51px;margin: 0 auto;"><img src="bqsafety/img/logo/bqsafety.png" alt="logo"></a>
                        <p class="text-center">Accede a <b>BQSafety</b></p>
                        <hr>

                        {{ Form::open(['route'=>'login']) }}

                        <div class="form-group{{ $errors->has('user_username') ? ' has-danger' : '' }}">
                            <label for="user_username" class="col-form-label text-lg-right">Usuario:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::text('user_username', null, ['class'=>'form-control', 'autofocus'=>'autofocus', 'autocomplete'=>'off']) }}
                                @if ($errors->has('user_username'))
                                    <span class="form-control-feedback">{{ $errors->first('user_username') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label for="password" class="col-form-label text-lg-right">Contraseña:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::password('password', ['class'=>'form-control', 'autocomplete'=>'off']) }}
                                @if ($errors->has('password'))
                                    <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success btn-block">Acceder</button>
                                <a href="{{ url('/register') }}" class="btn btn-create btn-block">Registrarse</a>
                            </div>
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
                <div class="boot text-center small mt-2">
                    <p><a href="#">¿Has perdido tu contraseña?</a></p>
                    <p><a href="{{ url('/') }}">← Volver a BQSafety</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
