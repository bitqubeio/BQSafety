@extends('layouts.main')

@section('title', 'Reportes')

@section('content')

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h1 class="col-lg-6"><i class="fa fa-folder-open-o"></i>Reportes</h1>
                        <div class="col-lg-6 text-right">
                            <!-- buttons -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table responsive table-bqsafety table-hover" id="grid-reportsheets"
                           data-url="{{ url('location') }}">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Creado</th>
                            <th>Reportante</th>
                            <th>Ubicación</th>
                            <th>Clasificación</th>
                            <th>Descripción</th>
                            <th>Accion Correctiva</th>
                            <th>Foto</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @permission('reportsheet-delete')
    @include('partials.modalQuestion')
    @endpermission

@endsection

@section('javascript')

    <!-- DataTables -->
    {{ Html::script('bqsafety/libs/datatables/js/dataTables.keyTable.js') }}

    @permission(['reportsheet-create','reportsheet-edit','reportsheet-delete']){{ Html::script('bqsafety/js/toastr.js') }}@endpermission

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(document).ready(function () {
            $('#grid-reportsheets').DataTable({
                "bAutoWidth": false,
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('api/allreportsheets') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'text-center font-weight-bold'},
                    {data: 'created_at', name: 'created_at', sClass: 'text-center'},
                    {data: 'user_username', name: 'user_username', sClass: 'text-center'},
                    {data: 'location_name', name: 'location_name'},
                    {data: 'reportsheet_classification', name: 'reportsheet_classification', sClass: 'text-center'},
                    {data: 'reportsheet_description', name: 'reportsheet_description'},
                    {data: 'reportsheet_correctiveaction', name: 'reportsheet_correctiveaction'},
                    {data: 'reportsheet_image', name: 'reportsheet_image', sClass: 'text-center'},
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
