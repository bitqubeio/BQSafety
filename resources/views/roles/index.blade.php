@extends('layouts.main')

@section('title', 'Roles')

@section('content')

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h1 class="col-lg-6"><i class="fa fa-vcard-o"></i>Roles</h1>
                        <div class="col-lg-6 text-right">
                            @permission('role-create')
                            <a href="{{ route('roles.create') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Rol
                            </a>
                            @endpermission
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table responsive table-bqsafety table-hover" id="grid-roles"
                           data-url="{{ url('roles') }}">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Creado</th>
                            <th>Nombre</th>
                            <th>Nombre para mostrar</th>
                            <th>Descripción</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @permission('role-delete')
    @include('partials.modalQuestion')
    @endpermission

@endsection

@section('javascript')

    <!-- DataTables -->
    {{ Html::script('bqsafety/libs/datatables/js/dataTables.keyTable.js') }}
    @permission('role-delete')
    {{ Html::script('bqsafety/js/roles.js') }}
    @endpermission
    {{ Html::script('bqsafety/js/toastr.js') }}
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(document).ready(function () {
            $('#grid-roles').DataTable({
                "bAutoWidth": false,
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('api/roles') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'text-center font-weight-bold'},
                    {data: 'created_at', name: 'created_at', sClass: 'text-center'},
                    {data: 'name', name: 'name'},
                    {data: 'display_name', name: 'display_name'},
                    {data: 'description', name: 'description'},
                    {data: 'updated_at', name: 'updated_at', sClass: 'text-center'},
                    {data: 'action', name: 'action', sClass: 'actions text-center', orderable: false, searchable: false}
                ],
                "language": {
                    "url": "{{ url('bqsafety/libs/datatables/json/Spanish.json') }}"
                },
                keys: true,
                stateSave: true
            });
        });
    </script>
@endsection
