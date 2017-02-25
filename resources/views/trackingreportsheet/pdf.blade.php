<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="author" content="BQSafety">
    <meta name="version" content="{{ Date::now() }}">

    <title>SEGUIMIENTO RACS - N° {{ $racs->id }} | BQSafety</title>

    <link href="css/pdf.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <header class="clearfix">
        <div class="row">
            <div id="logo">
                <img src="bqsafety/img/calcesur.png">
                <div class="info"><b>Cal y Cemento Sur S.A.</b>
                    <br> Seguridad Integral
                    <br> Km 11 Panamericana Sur Juliaca – Puno; Caracoto, Perú
                    <br> Tel 051-328544 anexo 4636 | RPM *200056</div>

            </div>
            <div class="ajustar"></div>
        </div>
    </header>
    <table class="tabla">
        <thead>
            <tr>
                <th colspan="4">SEGUIMIENTO RACS - N° {{ $racs->id }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="seccion" style="white-space:nowrap">HOJA DE REPORTE N°</td>
                <td>{{ $racs->id }}</td>
                <td class="seccion">CLASIFICACIÓN</td>
                <?php
                $classifications = $racs->reportsheet_classification;
                $classification = explode(',', $classifications);
                ?>
                <td>
                    @if (in_array(1, $classification))
                        Accidente Seguridad<br>
                    @endif
                    @if(in_array(2, $classification))
                        Incidente Seguridad<br>
                        @endif
                    @if(in_array(3, $classification))
                        Acto Subestandar<br>
                        @endif
                    @if(in_array(4, $classification))
                        Accidente Ambiental<br>
                        @endif
                    @if(in_array(5, $classification))
                        Incidente Ambiental<br>
                        @endif
                    @if(in_array(6, $classification))
                        Condición Subestandar<br>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="4" class="titulo">DATOS DE LA PERSONA QUE REPORTA</td>
            </tr>
            <tr>
                <td class="seccion">APELLIDOS Y NOMBRES</td>
                <td colspan="3">{{ $racs->user->user_lastnames }}, {{ $racs->user->user_names }}</td>
            </tr>
            <tr>
                <td class="seccion">EMPRESA</td>
                <td>{{ $racs->user->company->company_name }}</td>
                <td class="seccion">CARGO</td>
                <td>{{ $racs->user->user_job }}</td>
            </tr>
            <tr>
                <td class="seccion">ÁREA</td>
                <td>{{ $racs->user->user_area }}</td>
                <td class="seccion">FECHA</td>
                <td>{{ $racs->created_at->toFormattedDateString() }}</td>
            </tr>
            <tr>
                <td class="seccion">LUGAR</td>
                <td>{{ $racs->location->location_name }}</td>
                <td class="seccion">HORA</td>
                <td>{{ $racs->created_at->format('h:i A') }}</td>
            </tr>
            <tr>
                <td class="seccion">DESCRIPCIÓN DEL REPORTE</td>
                <td colspan="3" style="text-align:justify;">{{ $racs->reportsheet_description }}</td>
            </tr>
            <tr>
                <td class="seccion">ACCIÓN CORRECTIVA</td>
                <td colspan="3" style="text-align:justify;">{{ $racs->reportsheet_correctiveaction }}</td>
            </tr>
            <tr>
                <td class="seccion">FOTO REPORTE @if($racs->reportsheet_status == 3)/<br> FOTO LEVANTADO @endif</td>
                <td colspan="3">
                    <img src="images/reportsheets/700px/{{ $racs->reportsheet_image }}" class="imag">
                    @if($racs->reportsheet_status == 3)
                    <img src="images/trackingreportsheets/700px/{{  $tracking->tracking_report_sheet_image }}" class="imag">
                    @endif
                    <div class="ajustar"></div>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="titulo">SEGUIMIENTO Y CONTROL</td>
            </tr>
            <tr>
                <td class="seccion">ESTADO</td>
                <td colspan="3">
                    @if($racs->reportsheet_status == 1)
                        Pendiente
                    @elseif($racs->reportsheet_status == 2)
                        En Proceso
                    @elseif($racs->reportsheet_status == 3)
                        Levantado
                    @endif

                </td>
            </tr>
            <tr>
                <td class="seccion">RESPONSABLE</td>
                <td colspan="3">{{ $tracking->tracking_report_sheet_responsible }}</td>
            </tr>
            <tr>
                <td class="seccion">FECHA INICIO</td>
                <td colspan="3">{{ Date::createFromFormat('Y-m-d', $tracking->tracking_report_sheet_start_date)->toFormattedDateString() }}</td>
            </tr>
            <tr>
                <td class="seccion">FECHA LIMITE</td>
                <td colspan="3">{{ Date::createFromFormat('Y-m-d', $tracking->tracking_report_sheet_end_date)->toFormattedDateString() }}</td>
            </tr>
            <tr>
                <td class="seccion">DESCRIPCIÓN</td>
                <td colspan="3" style="text-align:justify;">{{ $tracking->tracking_report_sheet_description }}</td>
            </tr>
        </tbody>
    </table>
        <div class="fechafooter">Generado: {{ Date::now() }}</div>
    <footer>
       "No hay trabajo tan urgente que no pueda ser ejecutado con seguridad".
    </footer>
</body>

</html>