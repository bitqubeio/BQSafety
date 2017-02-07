@extends('layouts.main')

@section('title', 'Nuevo Reporte')

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
                            <h1><i class="fa fa-plus"></i>Nuevo Reporte</h1>
                            <hr>

                            {{ Form::open(['route'=>'reportsheet.store', 'enctype' => 'multipart/form-data']) }}

                                <div class="form-group{{ $errors->has('location_id') ? ' has-danger' : '' }}  row">
                                    <label for="location_id" class="col-lg-2 col-form-label text-lg-right">Lugar:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        {{ Form::select('location_id', $locations, null, ['placeholder' => 'Seleccione una ubicación...', 'class'=>'form-control','autofocus'=>'']) }}
                                        @if ($errors->has('location_id'))
                                            <span class="form-control-feedback">{{ $errors->first('location_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('reportsheet_classification') ? ' has-danger' : '' }}  row">
                                    <label for="reportsheet_classification" class="col-lg-2 col-form-label text-lg-right">Clasificación:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10 mt-2">

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {!! Form::checkbox('reportsheet_classification[]', 1, false, ['class'=>'form-check-input']) !!} &nbsp;Accidente Seguridad
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {!! Form::checkbox('reportsheet_classification[]', 2, false, ['class'=>'form-check-input']) !!} &nbsp;Incidente Seguridad
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {!! Form::checkbox('reportsheet_classification[]', 3, false, ['class'=>'form-check-input']) !!} &nbsp;Acto Subestandar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {!! Form::checkbox('reportsheet_classification[]', 4, false, ['class'=>'form-check-input']) !!} &nbsp;Accidente Ambiental
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {!! Form::checkbox('reportsheet_classification[]', 5, false, ['class'=>'form-check-input']) !!} &nbsp;Incidente Ambiental
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {!! Form::checkbox('reportsheet_classification[]', 6, false, ['class'=>'form-check-input']) !!} &nbsp;Condición Subestandar
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($errors->has('reportsheet_classification'))
                                            <span class="form-control-feedback">{{ $errors->first('reportsheet_classification') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('reportsheet_description') ? ' has-danger' : '' }}  row">
                                    <label for="reportsheet_description" class="col-lg-2 col-form-label text-lg-right">Descripción del reporte:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        {{ Form::textarea('reportsheet_description', null, ['class'=>'form-control', 'rows'=>4, 'autofocus'=>'on']) }}
                                        @if ($errors->has('reportsheet_description'))
                                            <span class="form-control-feedback">{{ $errors->first('reportsheet_description') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('reportsheet_correctiveaction') ? ' has-danger' : '' }}  row">
                                    <label for="reportsheet_correctiveaction" class="col-lg-2 col-form-label text-lg-right">Acción Correctiva:</label>
                                    <div class="col-lg-10">
                                        {{ Form::textarea('reportsheet_correctiveaction', null, ['class'=>'form-control', 'rows'=>4, 'autofocus'=>'on']) }}
                                        @if ($errors->has('reportsheet_correctiveaction'))
                                            <span class="form-control-feedback">{{ $errors->first('reportsheet_correctiveaction') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('reportsheet_image') ? ' has-danger' : '' }}  row">
                                    <label for="reportsheet_image" class="col-lg-2 col-form-label text-lg-right">Foto:</label>
                                    <div class="col-lg-10">
                                        {!! Form::file('reportsheet_image',['id'=>'reportsheet_image','class'=>'filestyle','data-input'=>'false']) !!}
                                        @if ($errors->has('reportsheet_image'))
                                            <span class="form-control-feedback">{{ $errors->first('reportsheet_image') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="offset-lg-2 text-muted mb-3">
                                    (<span class="text-danger">*</span>) campos obligatorios
                                </div>

                                <div class="form-actions text-right">
                                    {{ Form::submit('Enviar Reporte', ['name'=>'action', 'class'=>'btn btn-success']) }}
                                    <a href="{{ url('/reportsheet') }}" class="btn btn-secondary">Cancelar</a>
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
