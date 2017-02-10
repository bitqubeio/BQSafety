@extends('layouts.main')

@section('title', 'Editar Usuario')

@section('content')

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                </div>
            </div>
            <div class="row my-1">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <h1><i class="fa fa-pencil"></i>Editar Usuario</h1>
                            <hr>

                            {{ Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) }}

                            <div class="form-group{{ $errors->has('user_username') ? ' has-danger' : '' }}  row">
                                <label for="user_username" class="col-lg-2 col-form-label text-lg-right">Usuario:
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::text('user_username', null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'']) }}
                                    @if ($errors->has('user_username'))
                                        <span class="form-control-feedback">{{ $errors->first('user_username') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_names') ? ' has-danger' : '' }}  row">
                                <label for="user_names" class="col-lg-2 col-form-label text-lg-right">Nombre(s):
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::text('user_names', null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'']) }}
                                    @if ($errors->has('user_names'))
                                        <span class="form-control-feedback">{{ $errors->first('user_names') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_lastnames') ? ' has-danger' : '' }}  row">
                                <label for="user_lastnames" class="col-lg-2 col-form-label text-lg-right">Apellidos:
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::text('user_lastnames', null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'']) }}
                                    @if ($errors->has('user_lastnames'))
                                        <span class="form-control-feedback">{{ $errors->first('user_lastnames') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('company_id') ? ' has-danger' : '' }}  row">
                                <label for="company_id" class="col-lg-2 col-form-label text-lg-right">Empresa:
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::select('company_id', $companies, null,['placeholder' => 'Seleccione empresa...', 'class'=>'form-control', 'disabled'=>'']) }}
                                    @if ($errors->has('company_id'))
                                        <span class="form-control-feedback">{{ $errors->first('company_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_code') ? ' has-danger' : '' }}  row">
                                <label for="user_code" class="col-lg-2 col-form-label text-lg-right">Código:
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::text('user_code', null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'']) }}
                                    @if ($errors->has('user_code'))
                                        <span class="form-control-feedback">{{ $errors->first('user_code') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_job') ? ' has-danger' : '' }}  row">
                                <label for="user_job" class="col-lg-2 col-form-label text-lg-right">Cargo:
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::text('user_job', null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'']) }}
                                    @if ($errors->has('user_job'))
                                        <span class="form-control-feedback">{{ $errors->first('user_job') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_area') ? ' has-danger' : '' }}  row">
                                <label for="user_area" class="col-lg-2 col-form-label text-lg-right">Area:
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::text('user_area', null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'']) }}
                                    @if ($errors->has('user_area'))
                                        <span class="form-control-feedback">{{ $errors->first('user_area') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_email') ? ' has-danger' : '' }}  row">
                                <label for="user_email" class="col-lg-2 col-form-label text-lg-right">Correo electrónico:
                                </label>
                                <div class="col-lg-10">
                                    {{ Form::email('user_email', null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'']) }}
                                    @if ($errors->has('user_email'))
                                        <span class="form-control-feedback">{{ $errors->first('user_email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_status" class="col-lg-2 col-form-label text-lg-right">Activo:</label>
                                <div class="col-lg-10 mt-2">
                                    {!! Form::hidden('user_status', 0) !!}
                                    {!! Form::checkbox('user_status') !!}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('roles') ? ' has-danger' : '' }}  row">
                                <label for="roles" class="col-lg-2 col-form-label text-lg-right">Rol(es):
                                </label>
                                <div class="col-lg-10">
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple', 'autofocus'=>'autofocus')) !!}
                                    @if ($errors->has('roles'))
                                        <span class="form-control-feedback">{{ $errors->first('roles') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="offset-lg-2 text-muted mb-3">
                                (<span class="text-danger">*</span>) campos obligatorios
                            </div>

                            <div class="form-actions text-right">
                                {{ Form::submit('Actualizar', ['name'=>'action', 'class'=>'btn btn-success']) }}
                                <a href="{{ url('/users') }}" class="btn btn-secondary">Cancelar</a>
                            </div>

                            {{ Form::close() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
