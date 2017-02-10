@extends('layouts.main')

@section('title', 'Empresa: ' . $company->company_name)

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
                        <h1 class="col-lg-6"><i class="fa fa-eye"></i>Empresa: {{ $company->company_name }}</h1>
                        <div class="col-lg-6 text-right">
                            @permission('company-create')
                            <a href="{{ url('/company/create') }}" class="btn btn-create btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                            @endpermission
                            @permission('company-edit')
                            <a href="{{ url('/company/'.$company->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                            @endpermission
                            <a href="{{ url('/company') }}" class="btn btn-secondary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Empresas</a>
                        </div>
                    </div>

                        <div class="mt-4" id="view-reports">
                            <table class="table table-view-sm">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{ $company->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{ $company->company_name }}</td>
                                </tr>
                                <tr>
                                    <td>Descripción</td>
                                    <td>{{ $company->company_description }}</td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td>
                                        @if($company->company_status)
                                            <span class="badge badge-pill badge-info">Activo</span>
                                        @else
                                            <span class="badge badge-pill badge-default">Inactivo</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creado</td>
                                    <td>{{ $company->created_at->toDayDateTimeString() }}</td>
                                </tr>
                                <tr>
                                    <td>Actualizado</td>
                                    <td>{{ $company->updated_at->toDayDateTimeString() }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
