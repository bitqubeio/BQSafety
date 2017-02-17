@extends('layouts.main')

@section('content')
    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Reportes</h4>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Semana</a>
                                </li>
                                @role(['superadmin','admin'])
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">General</a>
                                </li>
                                @endrole
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <canvas id="nowChartjs"></canvas>
                                </div>
                                @role(['superadmin','admin'])
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <canvas height="150" id="pieChartjs"></canvas>
                                </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Últimos reportes</h4>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Rep. N°</th>
                                    <th>Descripción del Reporte</th>
                                    <th>Estado</th>
                                    <th class=" text-center">Ver</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <th scope="row"><a
                                                    href="{{ url('reportsheet/'. $report->id) }}">{{ $report->id }}</a>
                                        </th>
                                        <td>
                                            <p class="small text-muted">{{ $report->location_name }}</p>
                                            <p class="small">{{ str_limit($report->reportsheet_description, 40) }}</p>
                                        </td>
                                        <td>
                                            @if ($report->reportsheet_status == 0)
                                                <span class="badge badge-danger badge-md"><i
                                                            class="fa fa-eye-slash"></i> No Revisado</span>
                                            @else
                                                <span class="badge badge-success badge-md"><i class="fa fa-eye"></i> Revisado</span>
                                            @endif
                                        </td>
                                        <td class="actions text-center"><a
                                                    href="{{ url('reportsheet/'. $report->id) }}"><i
                                                        class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <a href="{{ url('reportsheet') }}" class="btn btn-sm btn-create">Ver todo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    {!! $nowChartjs->render() !!}
    @role(['superadmin','admin'])
    {!! $pieChartjs->render() !!}
    @endrole
@endsection
