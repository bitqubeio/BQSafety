<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    {{ Html::style('css/excel.css') }}

</head>

<body>
<table border="1">
    <tbody>
    <tr>
        <td width="5" style="background:#C4BD97; font-weight: bold">Rep. Nº</td>
        <td width="10" style="background:#C4BD97; font-weight: bold">MES</td>
        <td width="20" style="background:#C4BD97; font-weight: bold">UBICACIÓN</td>
        <td width="15" style="background:#C4BD97; font-weight: bold">FECHA</td>
        <td width="10" style="background:#C4BD97; font-weight: bold">HORA</td>
        <td width="25" style="background:#CCC0DA; font-weight: bold">CLASIFICACIÓN</td>
        <td width="70" style="background:#CCC0DA; font-weight: bold">DESCRIPCIÓN DEL REPORTE</td>
        <td width="20" style="background:#CCC0DA; font-weight: bold">AREA, EMPRESA Y/O INVOLUCRADO</td>
        <td width="16" style="background:#C4D79B; font-weight: bold">REPORTADO POR</td>
        <td width="16" style="background:#C4D79B; font-weight: bold">EMPRESA</td>
        <td width="18" style="background:#C4D79B; font-weight: bold">ÁREA</td>
        <td width="70" style="background:#C4D79B; font-weight: bold">ACCIONES CORRECTIVAS A TOMAR</td>
        <td width="15" style="background:#92CDDC; font-weight: bold">ESTADO</td>
        <td width="18" style="background:#92CDDC; font-weight: bold">JEFE DE AREA/ RESPONSABLE LEVANTAMIENTO</td>
        <td width="15" style="background:#92CDDC; font-weight: bold">PLAZO</td>
        <td width="30" style="background:#92CDDC; font-weight: bold">SEGUIMIENTO</td>
    </tr>
    @foreach($trackingReportSheets as $trackingReportSheet)
        <tr>
            <td height="50">{{ $trackingReportSheet->reportsheet_id }}</td>
            <td>{{ Date::parse($trackingReportSheet->reportsheet_datetime)->format('F') }}</td>
            <td>{{ $trackingReportSheet->location_name }}</td>
            <td>{{ date('d/m/y', strtotime($trackingReportSheet->reportsheet_datetime)) }}</td>
            <td>{{ date('H:i', strtotime($trackingReportSheet->reportsheet_datetime)) }}</td>
            <td>
                <?php
                $classifications = $trackingReportSheet->reportsheet_classification;
                $classification = explode(',', $classifications);
                ?>
                @if (in_array(1, $classification))
                    Accidente de Trabajo
                @endif
                @if (in_array(2, $classification))
                    Incidente
                @endif
                @if (in_array(3, $classification))
                    Incidente Peligroso
                @endif
                @if (in_array(4, $classification))
                    Acto Subestandar
                @endif
                @if (in_array(5, $classification))
                    Accidente Ambiental
                @endif
                @if (in_array(6, $classification))
                    Incidente Ambiental
                @endif
                @if (in_array(7, $classification))
                    Condición Subestandar
                @endif
            </td>
            <td>{{ $trackingReportSheet->reportsheet_description }}</td>
            <td>{{ $trackingReportSheet->location_name }}</td>
            <td>{{ $trackingReportSheet->names }}</td>
            <td>{{ $trackingReportSheet->company_name }}</td>
            <td>{{ $trackingReportSheet->user_job }} - {{  $trackingReportSheet->user_area }}</td>
            <td>{{ $trackingReportSheet->reportsheet_correctiveaction }}</td>
            @if($trackingReportSheet->tracking_report_sheet_status == 1)
                <td style="background: #D14D4D"><span style="color: #FFF">PENDIENTE</span></td>
            @elseif($trackingReportSheet->tracking_report_sheet_status == 2)
                <td style="background: #F0AD4E"><span style="color: #FFF">EN PROCESO</span></td>
            @elseif($trackingReportSheet->tracking_report_sheet_status == 3)
                <td style="background: #08A563"><span style="color: #FFF">LEVANTADO</span></td>
            @endif
            <td>{{ $trackingReportSheet->tracking_report_sheet_responsible }}</td>
            <td>Del: {{ date('d/m/Y',strtotime($trackingReportSheet->tracking_report_sheet_start_date)) }}
                Al: {{ date('d/m/Y',strtotime($trackingReportSheet->tracking_report_sheet_end_date)) }}</td>
            <td>{{ $trackingReportSheet->tracking_report_sheet_description  }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

</html>