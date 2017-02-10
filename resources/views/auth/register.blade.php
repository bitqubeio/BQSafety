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
                        <a href="/" style="display: block;width: 51px;margin: 0 auto;"><img src="bqsafety/img/user.png" alt="logo"></a>
                        <p class="text-center">Registrate en <b>BQSafety</b></p>
                        <hr>

                        {{ Form::open(['route'=>'register']) }}

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

                        <div class="form-group{{ $errors->has('user_names') ? ' has-danger' : '' }}">
                            <label for="user_names" class="col-form-label text-lg-right">Nombre(s):
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::text('user_names', null, ['class'=>'form-control', 'autocomplete'=>'off']) }}
                                @if ($errors->has('user_names'))
                                    <span class="form-control-feedback">{{ $errors->first('user_names') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_lastnames') ? ' has-danger' : '' }}">
                            <label for="user_lastnames" class="col-form-label text-lg-right">Apellidos:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::text('user_lastnames', null, ['class'=>'form-control', 'autocomplete'=>'off']) }}
                                @if ($errors->has('user_lastnames'))
                                    <span class="form-control-feedback">{{ $errors->first('user_lastnames') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company_id') ? ' has-danger' : '' }}">
                            <label for="company_id" class="col-form-label text-lg-right">Empresa:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::select('company_id', $companies, null,['placeholder' => 'Seleccione empresa...', 'class'=>'form-control']) }}
                            @if ($errors->has('company_id'))
                                    <span class="form-control-feedback">{{ $errors->first('company_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_code') ? ' has-danger' : '' }}">
                            <label for="user_code" class="col-form-label text-lg-right">Código:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::text('user_code', null, ['class'=>'form-control', 'autocomplete'=>'off']) }}
                                @if ($errors->has('user_code'))
                                    <span class="form-control-feedback">{{ $errors->first('user_code') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_job') ? ' has-danger' : '' }}">
                            <label for="user_job" class="col-form-label text-lg-right">Cargo:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::text('user_job', null, ['class'=>'form-control', 'autocomplete'=>'off']) }}
                                @if ($errors->has('user_job'))
                                    <span class="form-control-feedback">{{ $errors->first('user_job') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_area') ? ' has-danger' : '' }}">
                            <label for="user_area" class="col-form-label text-lg-right">Area:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::text('user_area', null, ['class'=>'form-control', 'autocomplete'=>'off']) }}
                                @if ($errors->has('user_area'))
                                    <span class="form-control-feedback">{{ $errors->first('user_area') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_email') ? ' has-danger' : '' }}">
                            <label for="user_email" class="col-form-label text-lg-right">Correo electrónico:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::email('user_email', null, ['class'=>'form-control', 'autocomplete'=>'off']) }}
                                @if ($errors->has('user_email'))
                                    <span class="form-control-feedback">{{ $errors->first('user_email') }}</span>
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

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-lg-right">Confirmar contraseña:
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                {{ Form::password('password_confirmation', ['id'=>'password-confirm', 'class'=>'form-control', 'autocomplete'=>'off']) }}
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success btn-block">Registrarse</button>
                            </div>
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
                <div class="boot text-center small mt-2">
                    <p><a href="{{ url('/') }}">← Volver a BQSafety</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
