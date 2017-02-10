@extends('layouts.main')

@section('title', 'Rol: ' . $role->display_name)

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
                        <h1 class="col-lg-6"><i class="fa fa-eye"></i>Rol: {{ $role->display_name }}</h1>
                        <div class="col-lg-6 text-right">
                            @permission('role-create')
                            <a href="{{ url('/roles/create') }}" class="btn btn-create btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                            @endpermission
                            @permission('role-edit')
                            <a href="{{ url('/roles/'.$role->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                            @endpermission
                            <a href="{{ url('/roles') }}" class="btn btn-secondary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Roles</a>
                        </div>
                    </div>

                        <div class="mt-4" id="view-reports">
                            <table class="table table-view-sm">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{ $role->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{ $role->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nombre para mostrar</td>
                                    <td>{{ $role->display_name }}</td>
                                </tr>
                                <tr>
                                    <td>Permisos</td>
                                    <td>
                                        @if(!empty($rolePermissions))
                                            @foreach($rolePermissions as $v)
                                                <span class="badge badge-success badge-pill">
                                                    <i class="fa fa-check"></i> {{ $v->display_name }}
                                                </span><br>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creado</td>
                                    <td>{{ $role->created_at->toDayDateTimeString() }}</td>
                                </tr>
                                <tr>
                                    <td>Actualizado</td>
                                    <td>{{ $role->updated_at->toDayDateTimeString() }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
