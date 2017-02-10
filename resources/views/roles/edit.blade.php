@extends('layouts.main')

@section('title', 'Nuevo Rol')

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
                            <h1><i class="fa fa-plus"></i>Nuevo Rol</h1>
                            <hr>

                            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

                                <div class="form-group{{ $errors->has('display_name') ? ' has-danger' : '' }}  row">
                                    <label for="display_name" class="col-lg-2 col-form-label text-lg-right">Nombre para mostrar:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        {!! Form::text('display_name', null, array('placeholder' => 'Nombre para mostrar','class' => 'form-control', 'autocomplete'=>'off')) !!}
                                        @if ($errors->has('display_name'))
                                            <span class="form-control-feedback">{{ $errors->first('display_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}  row">
                                    <label for="description" class="col-lg-2 col-form-label text-lg-right">Descripción:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        {!! Form::textarea('description', null, array('placeholder' => 'Descripción','class' => 'form-control','style'=>'height:100px')) !!}
                                        @if ($errors->has('description'))
                                            <span class="form-control-feedback">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('permission') ? ' has-danger' : '' }}  row">
                                    <label for="permission" class="col-lg-2 col-form-label text-lg-right">Permisos:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{ $value->display_name }}</label>
                                            <br/>
                                        @endforeach
                                        @if ($errors->has('permission'))
                                            <span class="form-control-feedback">{{ $errors->first('permission') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="offset-lg-2 text-muted mb-3">
                                    (<span class="text-danger">*</span>) campos obligatorios
                                </div>

                                <div class="form-actions text-right">
                                    {{ Form::submit('Actualizar', ['name'=>'action', 'class'=>'btn btn-success']) }}
                                    <a href="{{ url('/roles') }}" class="btn btn-secondary">Cancelar</a>
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
