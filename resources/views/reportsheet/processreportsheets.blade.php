@extends('layouts.main')

@section('title', 'Reportes en proceso')

@section('content')

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h1 class="col-lg-6"><i class="fa fa-file-text-o"></i>Reportes en proceso</h1>
                        <div class="col-lg-6 text-right">
                            <!-- buttons -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table responsive table-bqsafety table-hover" id="grid-processreportsheets"
                           data-url="{{ url('location') }}">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Estado</th>
                            <th>Reportante</th>
                            <th>Clasificación</th>
                            <th>Reporte</th>
                            <th>Responsable</th>
                            <th>Descripción</th>
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

    @include('trackingreportsheet.create')

@endsection

@section('javascript')

    <!-- DataTables -->
    {{ Html::script('bqsafety/js/tracking.js') }}
    {{ Html::script('bqsafety/js/alerts.js') }}
    {{ Html::script('bqsafety/js/toastr.js') }}
    {{ Html::script('bqsafety/libs/datatables/js/dataTables.keyTable.js') }}

    @permission(['reportsheet-create','reportsheet-edit','reportsheet-delete']){{ Html::script('bqsafety/js/toastr.js') }}@endpermission

    <script>
        $(document).ready(function () {
            $('#grid-processreportsheets').DataTable({
                "bAutoWidth": false,
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('api/listProcessReportSheets') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'text-center font-weight-bold'},
                    {data: 'reportsheet_status', name: 'reportsheet_status', sClass: 'text-center'},
                    {data: 'user_username', name: 'user_username', sClass: 'text-center'},
                    {data: 'reportsheet_classification', name: 'reportsheet_classification'},
                    {data: 'reportsheet_description', name: 'reportsheet_description'},
                    {data: 'tracking_report_sheet_responsible', name: 'tracking_report_sheet_responsible', sClass: 'text-center'},
                    {data: 'tracking_report_sheet_description', name: 'tracking_report_sheet_description'},
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

        // datePicker
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            todayBtn: 'linked',
            language: "es",
            orientation: "bottom auto",
            autoclose: true,
            todayHighlight: true
        });

        // hide window create
        $('.chatter-close, #cancel_discussion').click(function () {
            resetAll(formTrackingReportSheet);
            $('#new_discussion').slideUp();
        });
    </script>
@endsection
