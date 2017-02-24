<div id="chatter">
    <div id="new_discussion">

        <div class="chatter_loader" id="new_discussion_loader" style="display: none;"></div>
        <div class="row">
            <div class="col-md-11"></div>
            <div class="col-md-1"><i class="fa fa-close chatter-close"></i></div>
        </div>

        {{ Form::open(['id' => 'formTrackingReportSheet', 'enctype' => 'multipart/form-data','method' => 'PATCH', 'data-url' => url('TrackingReportSheet')]) }}

        {!! Form::hidden('idTracking', null, ['id'=>'idTracking']) !!}
        {!! Form::hidden('reportsheet_id', null, ['id'=>'reportsheet_id']) !!}

        <div class="row">
            <div class="col-lg-6">
                <div id="field_tracking_report_sheet_responsible" class="form-group">
                    <label for="tracking_report_sheet_responsible" class="form-control-label">Responsable:</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('tracking_report_sheet_responsible', null, ['id'=>'tracking_report_sheet_responsible', 'class'=>'form-control', 'placeholder'=>'Responsable', 'autocomplete'=>'off']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="field_tracking_report_sheet_status" class="form-group">
                    <label for="tracking_report_sheet_status" class="form-control-label">Estado:</label>
                    <span class="text-danger">*</span>
                    {{ Form::select('tracking_report_sheet_status', [1=>'Pendiente',2=>'En Proceso',3=>'Levantado'], null,['id'=>'tracking_report_sheet_status', 'placeholder' => 'Estado...', 'class'=>'form-control','onChange'=>'view(this.value);']) }}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div id="field_tracking_report_sheet_start_date" class="form-group">
                    <label for="tracking_report_sheet_start_date" class="form-control-label">Fecha Inicio:</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('tracking_report_sheet_start_date', null, ['id'=>'tracking_report_sheet_start_date', 'class'=>'form-control datepicker', 'placeholder'=>'Fecha Inicio', 'autocomplete'=>'off']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="field_tracking_report_sheet_end_date" class="form-group">
                    <label for="tracking_report_sheet_end_date" class="form-control-label">Fecha Límite:</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('tracking_report_sheet_end_date', null, ['id'=>'tracking_report_sheet_end_date', 'class'=>'form-control datepicker', 'placeholder'=>'Fecha Límite', 'autocomplete'=>'off']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
        </div>

        <div id="field_tracking_report_sheet_description" class="form-group">
            <label for="tracking_report_sheet_description" class="form-control-label">Descripción:</label>
            <span class="text-danger">*</span>
            {!! Form::textarea('tracking_report_sheet_description', null, ['id'=>'tracking_report_sheet_description', 'class'=>'form-control', 'placeholder'=>'Descripción']) !!}
            <div class="form-control-feedback"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div id="field_tracking_report_sheet_image" class="form-group" style="display: none">
                    <label for="tracking_report_sheet_image" class="form-control-label">Foto:</label>
                    <span class="text-danger">*</span>
                    {!! Form::file('tracking_report_sheet_image',['id'=>'tracking_report_sheet_image','accept'=>'image/*','class'=>'filestyle','data-input'=>'false']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="field_tracking_report_sheet_file" class="form-group" style="display: none">
                    <label for="tracking_report_sheet_file" class="form-control-label">Documento:</label>
                    <span class="text-danger">*</span>
                    {!! Form::file('tracking_report_sheet_file',['id'=>'tracking_report_sheet_file','accept'=>'application/pdf','class'=>'filestyle','data-input'=>'false','data-iconName'=>'fa fa-paperclip','data-buttonText'=>'Subir documento']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
        </div>

        <div class="text-muted">
            (<span class="text-danger">*</span>) campos obligatorios
        </div>

        <div class="text-right">
            {{ Form::submit('Actualizar', ['name' => 'action', 'class' => 'btn btn-create']) }}
            <button type="button" class="btn btn-secondary" id="cancel_discussion">Cancelar</button>
        </div>

        {{ Form::close() }}

    </div>
</div>