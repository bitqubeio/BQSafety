@extends('layouts.main')

@section('title', 'Ubicación: ' . $location->location_name)

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
                        <h1 class="col-lg-6"><i class="fa fa-eye"></i>Ubicación: {{ $location->location_name }}</h1>
                        <div class="col-lg-6 text-right">
                            <a href="{{ url('/location/create') }}" class="btn btn-create btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                            <a href="{{ url('/location/'.$location->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                            <a href="{{ url('/location') }}" class="btn btn-secondary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Ubicaciones</a>
                        </div>
                    </div>

                        <div class="mt-4" id="view-reports">
                            <table class="table table-view-sm">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{ $location->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{ $location->location_name }}</td>
                                </tr>
                                <tr>
                                    <td>Descripción</td>
                                    <td>{{ $location->location_description }}</td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td>
                                        @if($location->location_status)
                                            <span class="badge badge-pill badge-info">Activo</span>
                                        @else
                                            <span class="badge badge-pill badge-default">Inactivo</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creado</td>
                                    <td>{{ $location->created_at->toDayDateTimeString() }}</td>
                                </tr>
                                <tr>
                                    <td>Actualizado</td>
                                    <td>{{ $location->updated_at->toDayDateTimeString() }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
