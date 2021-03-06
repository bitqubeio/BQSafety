<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="BQSafety - http://bitqube.io">
    <meta name="description" content="Cal & Cemento Sur S.A.">
    <meta name="keywords" content="Somos una empresa dedicada a crear sistemas web para la necesidad de otras empresas, así ayudarlos a optimizar su papeleo y gestión de sus productos o servicios.">
    <title>HOJA DE REPORTE (Electrónico) - N° {{ $reportsheet->id }}</title>
    <style>
        html,
        body {
            font-family: sans-serif;
            font-size: 11px;
        }
    </style>
</head>

<body>
<table width="100%" border="0" cellspacing="2" cellpadding="5" bgcolor="#000">
    <tbody>
    <tr>
        <td valign="middle" align="center" bgcolor="#F2F2F2">
            <table border="0" width="100%">
                <tr>
                    <td align="left" width="25%"><img src="bqsafety/img/calcesur.png" width="35"></td>
                    <td align="center" width="50%"><b>HOJA DE REPORTE <i>(Electrónico)</i></b></td>
                    <td align="right" width="25%">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" align="center">
            <?php
            $classifications = $reportsheet->reportsheet_classification;
            $classification = explode(',', $classifications);
            ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>Accidente de Trabajo</td>
                    <td>
                        @if (in_array(1, $classification))
                            <input type="checkbox" checked>
                        @else
                            <input type="checkbox">
                        @endif
                    </td>
                    <td width="30">&nbsp;</td>
                    <td>Accidente Ambiental</td>
                    <td>
                        @if (in_array(5, $classification))
                            <input type="checkbox" checked>
                        @else
                            <input type="checkbox">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Incidente</td>
                    <td>
                        @if (in_array(2, $classification))
                            <input type="checkbox" checked>
                        @else
                            <input type="checkbox">
                        @endif
                    </td>
                    <td></td>
                    <td>Incidente Ambiental</td>
                    <td>
                        @if (in_array(6, $classification))
                            <input type="checkbox" checked>
                        @else
                            <input type="checkbox">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Incidente Peligroso</td>
                    <td>
                        @if (in_array(3, $classification))
                            <input type="checkbox" checked>
                        @else
                            <input type="checkbox">
                        @endif
                    </td>
                    <td></td>
                    <td>Condición Subestandar</td>
                    <td>
                        @if (in_array(7, $classification))
                            <input type="checkbox" checked>
                        @else
                            <input type="checkbox">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Acto Subestandar</td>
                    <td>
                        @if (in_array(4, $classification))
                            <input type="checkbox" checked>
                        @else
                            <input type="checkbox">
                        @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="center" bgcolor="#F2F2F2" style="padding:7px 0;"><b>DATOS DE LA PERSONA QUE REPORTA</b></td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" style="padding:10px 0;">
            <table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <td colspan="2"><b>Apellidos y Nombres:</b> {{ $reportsheet->user->user_lastnames }}, {{ $reportsheet->user->user_names }}</td>
                </tr>
                <tr>
                    <td><b>Empresa:</b> {{ $reportsheet->user->company->company_name }}</td>
                    <td><b>Cargo:</b> {{ $reportsheet->user->user_job }}</td>
                </tr>
                <tr>
                    <td><b>Area:</b> {{ $reportsheet->user->user_area }}</td>
                    <td><b>Fecha:</b> {{ date('d/m/Y', strtotime($reportsheet->reportsheet_datetime)) }}</td>
                </tr>
                <tr>
                    <td><b>Lugar:</b> {{ $reportsheet->location->location_name }} </td>
                    <td><b>Hora:</b> {{ date('H:i', strtotime($reportsheet->reportsheet_datetime)) }}</td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#F2F2F2" style="padding:7px 0;">
            <b>DESCRIPCIÓN DE REPORTE:</b>
            <br>
            <span align="justify" style="font-size:70%">¿Dónde y cómo ocurrio el evento? ¿Qué estaba haciendo la persona durante el evento? ¿Qué sucedió inesperadamente?. De preferencia colocar el nombre del afectado si corresponde.</span>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" valign="top">
            <div align="justify" style="padding-bottom:5px;height:89px;">{{ $reportsheet->reportsheet_description }}</div>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#F2F2F2" style="padding:7px 0;">
            <b>ACCIÓN CORRECTIVA:</b>
            <br>
            <span align="justify" style="font-size:70%">Colocar las acciones que se tomaron en el momento según corresponda.</span>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" valign="top">
            <div align="justify" style="padding:0px 0 50px 0;height: 80px;">{{ $reportsheet->reportsheet_correctiveaction }}</div>
        </td>
    </tr>
    </tbody>
</table>
<table width="100%" cellpadding="1" cellspacing="1">
    <tr>
        <td align="left" width="30%"><b>SI-F-131</b></td>
        <td align="center" width="40%" style="font-size:50%">Hoja de Reporte N° {{ $reportsheet->id }}</td>
        <td align="right" width="30%"><b>REVISIÓN:00</b></td>
    </tr>
</table>
</body>
</html>