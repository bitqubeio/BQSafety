@extends('layouts.main')

@section('title', 'Usuario: ' . $user->user_username)

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
                        <h1 class="col-lg-6"><i class="fa fa-user-o"></i>Usuario: {{ $user->user_username }}</h1>
                        <div class="col-lg-6 text-right">
                            @permission('item-edit')
                            <a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                            @endpermission
                            <a href="{{ url('/users') }}" class="btn btn-secondary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Usuarios</a>
                        </div>
                    </div>

                        <div class="mt-4" id="view-reports">
                            <table class="table table-view-sm">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td>Usuario</td>
                                    <td>{{ $user->user_username }}</td>
                                </tr>
                                <tr>
                                    <td>Nombres</td>
                                    <td>{{ $user->user_lastnames }}, {{ $user->user_names }}</td>
                                </tr>
                                <tr>
                                    <td>Empresa</td>
                                    <td>{{ $user->company->company_name }}</td>
                                </tr>
                                <tr>
                                    <td>Código</td>
                                    <td>{{ $user->user_code }}</td>
                                </tr>
                                <tr>
                                    <td>Cargo/Area</td>
                                    <td>{{ $user->user_job }} - {{ $user->user_area }}</td>
                                </tr>
                                <tr>
                                    <td>Correo electrónico</td>
                                    <td>{{ $user->user_email }}</td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td>
                                        @if($user->user_status)
                                            <span class="badge badge-pill badge-info">Activado</span>
                                        @else
                                            <span class="badge badge-pill badge-default">Desactivado</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Roles</td>
                                    <td>
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $v)
                                                <span class="badge badge-success badge-md">{{ $v->display_name }}</span><br>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creado</td>
                                    <td>{{ $user->created_at->toDayDateTimeString() }}</td>
                                </tr>
                                <tr>
                                    <td>Actualizado</td>
                                    <td>{{ $user->updated_at->toDayDateTimeString() }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
