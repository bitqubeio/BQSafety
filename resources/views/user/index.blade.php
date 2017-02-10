@extends('layouts.main')

@section('title', 'Usuarios')

@section('content')

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h1 class="col-lg-6"><i class="fa fa-users"></i>Usuarios</h1>
                        <div class="col-lg-6 text-right">
                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"
                                                                         aria-hidden="true"></i> Exportar a PDF</a>
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"
                                                                          aria-hidden="true"></i> Exportar a Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table responsive table-bqsafety table-hover" id="grid-users"
                           data-url="{{ url('user') }}">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Roles</th>
                            <th>Registrado</th>
                            <th>Usuario</th>
                            <th>Apellidos y Nombres</th>
                            <th>Empresa</th>
                            <th>Código</th>
                            <th>Cargo/Area</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @include('partials.modalQuestion')

@endsection

@section('javascript')

    <!-- DataTables -->
    {{ Html::script('bqsafety/libs/datatables/js/dataTables.keyTable.js') }}
    {{ Html::script('bqsafety/js/toastr.js') }}
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(document).ready(function () {
            $('#grid-users').DataTable({
                "bAutoWidth": false,
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('api/users') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'text-center font-weight-bold'},
                    {data: 'roles', name: 'roles', sClass: 'text-center'},
                    {data: 'created_at', name: 'created_at', sClass: 'text-center'},
                    {data: 'user_username', name: 'user_username', sClass: 'text-center'},
                    {data: 'user_names', name: 'user_names'},
                    {data: 'company_name', name: 'company_name'},
                    {data: 'user_code', name: 'user_code'},
                    {data: 'user_job', name: 'user_job', sClass: 'text-right'},
                    {data: 'user_email', name: 'user_email', sClass: 'text-center'},
                    {data: 'user_status', name: 'user_status'},
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
