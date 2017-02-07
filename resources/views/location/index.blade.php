@extends('layouts.main')

@section('title', 'Ubicaciones')

@section('content')

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h1 class="col-lg-6"><i class="fa fa-map-marker"></i>Ubicaciones</h1>
                        <div class="col-lg-6 text-right">
                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"
                                                                         aria-hidden="true"></i> PDF</a>
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"
                                                                          aria-hidden="true"></i> Excel</a>
                            <a href="{{ url('/location/create') }}" class="btn btn-secondary btn-sm"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Agregar Ubicación</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table responsive table-bqsafety table-hover" id="grid-locations"
                           data-url="{{ url('location') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>#</th>
                            <th>Creado</th>
                            <th>Nombre</th>
                            <th style="width: 50%">Descripción</th>
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
    {{ Html::script('bqsafety/js/location.js') }}
    {{ Html::script('bqsafety/js/toastr.js') }}
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(document).ready(function () {
            $('#grid-locations').DataTable({
                "bAutoWidth": false,
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('api/locations') }}",
                "columns": [
                    {data: 'delete', name: 'delete', sClass: 'text-center', orderable: false, searchable: false},
                    {data: 'id', name: 'id', sClass: 'text-center font-weight-bold'},
                    {data: 'created_at', name: 'created_at', sClass: 'text-center'},
                    {data: 'location_name', name: 'location_name'},
                    {data: 'location_description', name: 'location_description'},
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
