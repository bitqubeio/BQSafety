@extends('layouts.main')

@section('title', 'Reporte: N° ' . $reportsheet->id)

@section('content')

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                </div>
            </div>
            <div class="row my-1">
                <div class="col-lg-7">
                    <div class="row">
                        <h1 class="col-lg-6"><i class="fa fa-file-text-o"></i>Reporte: #{{ $reportsheet->id }}</h1>
                        <div class="col-lg-6 text-right">
                            @permission('reportsheet-export-pdf')
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-danger">Exportar a PDF</button>
                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" target="_blank" href="{{ url('/reportsheetPDFShow/'.$reportsheet->id) }}">Ver en pantalla</a>
                                    <a class="dropdown-item" href="{{ url('/reportsheetPDFDownload/'.$reportsheet->id) }}">Descargar</a>
                                    <a class="dropdown-item" href="{{ url('/reportsheetPDFDownloadWithImage/'.$reportsheet->id) }}">Descargar con foto</a>
                                </div>
                            </div>
                            @endpermission
                            <a href="{{ url('/reportsheets') }}" class="btn btn-secondary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Lista de Reportes</a>
                        </div>
                    </div>

                        <div class="mt-4" id="view-reports">
                            <table class="table table-view-sm">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{ $reportsheet->id }}</td>
                                </tr>
                                <tr>
                                    <td>Reportado por</td>
                                    <td>{{ $reportsheet->user->user_lastnames }}, {{ $reportsheet->user->user_names }}</td>
                                </tr>
                                <tr>
                                    <td>Empresa</td>
                                    <td>{{ $reportsheet->user->company->company_name }}</td>
                                </tr>
                                <tr>
                                    <td>Cargo</td>
                                    <td>{{ $reportsheet->user->user_job }}</td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>{{ $reportsheet->user->user_area }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha y Hora</td>
                                    <td>{{ date('d/m/Y - H:i', strtotime($reportsheet->reportsheet_datetime)) }}</td>
                                </tr>
                                <tr>
                                    <td>Ubicación</td>
                                    <td>{{ $reportsheet->location->location_name }}</td>
                                </tr>
                                <tr>
                                    <td>Clasificación</td>
                                    <td>
                                        <?php
                                        $classifications = $reportsheet->reportsheet_classification;
                                        $classification = explode(',', $classifications);
                                        ?>
                                        @if (in_array(1, $classification))
                                            <span style="background-color:#3498DB" class="badge badge-pill">Accidente de Trabajo</span><br>
                                        @endif
                                        @if (in_array(2, $classification))
                                            <span style="background-color:#2ECC71" class="badge badge-pill">Incidente</span><br>
                                        @endif
                                        @if (in_array(3, $classification))
                                            <span style="background-color:#7373FF" class="badge badge-pill">Incidente Peligroso</span><br>
                                        @endif
                                        @if (in_array(4, $classification))
                                            <span style="background-color:#F24E4A" class="badge badge-pill">Acto Subestandar</span><br>
                                        @endif
                                        @if (in_array(5, $classification))
                                            <span style="background-color:#293F55" class="badge badge-pill">Accidente Ambiental</span><br>
                                        @endif
                                        @if (in_array(6, $classification))
                                            <span style="background-color:#9B59B6" class="badge badge-pill">Incidente Ambiental</span><br>
                                        @endif
                                        @if (in_array(7, $classification))
                                            <span style="background-color:#F39C12" class="badge badge-pill">Condición Subestandar</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Descripción del reporte</td>
                                    <td>{{ $reportsheet->reportsheet_description }}</td>
                                </tr>
                                <tr>
                                    <td>Acción correctiva</td>
                                    <td>{{ $reportsheet->reportsheet_correctiveaction }}</td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>
                                        <a target="_blank" href="{{ url('/images/reportsheets/700px/'.$reportsheet->reportsheet_image) }}">
                                            <img src="{{ url('/images/reportsheets/thumbnail/'.$reportsheet->reportsheet_image) }}" title="Ver">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td>
                                        @if($reportsheet->company_status)
                                            <span class="badge badge-pill badge-info">Activo</span>
                                        @else
                                            <span class="badge badge-pill badge-default">Inactivo</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creado</td>
                                    <td>{{ $reportsheet->created_at->toDayDateTimeString() }}</td>
                                </tr>
                                <tr>
                                    <td>Actualizado</td>
                                    <td>{{ $reportsheet->updated_at->toDayDateTimeString() }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
