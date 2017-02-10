@extends('layouts.main')

@section('title', 'Editar Empresa')

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
                            <h1><i class="fa fa-pencil"></i>Editar Empresa</h1>
                            <hr>

                            {!! Form::model($company, ['route' => ['company.update', $company->id], 'method' => 'PATCH']) !!}

                                <div class="form-group{{ $errors->has('company_name') ? ' has-danger' : '' }}  row">
                                    <label for="company_name" class="col-lg-2 col-form-label text-lg-right">Nombre:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        {{ Form::text('company_name', null, ['class'=>'form-control', 'autofocus'=>'autofocus', 'autocomplete'=>'off']) }}
                                        @if ($errors->has('company_name'))
                                            <span class="form-control-feedback">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('company_description') ? ' has-danger' : '' }}  row">
                                    <label for="company_description" class="col-lg-2 col-form-label text-lg-right">Descripción</label>
                                    <div class="col-lg-10">
                                        {{ Form::textarea('company_description', null, ['class'=>'form-control', 'rows'=>4]) }}
                                        @if ($errors->has('company_description'))
                                            <span class="form-control-feedback">{{ $errors->first('company_description') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_status" class="col-lg-2 col-form-label text-lg-right">Activo</label>
                                    <div class="col-lg-10 mt-2">
                                        {!! Form::hidden('company_status', 0) !!}
                                        {!! Form::checkbox('company_status') !!}
                                    </div>
                                </div>


                                <div class="offset-lg-2 text-muted mb-3">
                                    (<span class="text-danger">*</span>) campos obligatorios
                                </div>

                                <div class="form-actions text-right">
                                    {{ Form::submit('Actualizar', ['name'=>'action', 'class'=>'btn btn-success']) }}
                                    <a href="{{ url('/company') }}" class="btn btn-secondary">Cancelar</a>
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
