<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="BQSafety - http://bitqube.io">
    <meta name="description" content="Cal & Cemento Sur S.A.">
    <meta name="keywords" content="Somos una empresa dedicada a crear sistemas web para la necesidad de otras empresas, así ayudarlos a optimizar su papeleo y gestión de sus productos o servicios.">
    <title>HOJA DE REPORTE - N° {{ $reportsheet->id }}</title>
    <style>
        html,
        body {
            font-family: sans-serif;
            font-size: 12.5px;
        }
    </style>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
        <td width="50%">
            <table width="100%" border="0" cellspacing="2" cellpadding="5" bgcolor="#000">
                <tbody>
                <tr>
                    <td valign="middle" align="center" bgcolor="#F2F2F2">
                        <table border="0" width="100%">
                            <tr>
                                <td align="left" width="25%"><img src="{{ url('bqsafety/img/calcesur.png') }}" width="35"></td>
                                <td align="center" width="50%"><b>HOJA DE REPORTE</b></td>
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
                                <td>Accidente Seguridad</td>
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
                                    @if (in_array(4, $classification))
                                        <input type="checkbox" checked>
                                    @else
                                        <input type="checkbox">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Incidente Seguridad</td>
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
                                    @if (in_array(5, $classification))
                                        <input type="checkbox" checked>
                                    @else
                                        <input type="checkbox">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Acto Subestandar</td>
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
                                    @if (in_array(6, $classification))
                                        <input type="checkbox" checked>
                                    @else
                                        <input type="checkbox">
                                    @endif
                                </td>
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
                                <td><b>Fecha:</b> {{ $reportsheet->created_at->toFormattedDateString() }}</td>
                            </tr>
                            <tr>
                                <td><b>Lugar:</b> {{ $reportsheet->location->location_name }} </td>
                                <td><b>Hora:</b> {{ $reportsheet->created_at->format('h:i A') }}</td>
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
                    <td bgcolor="#FFFFFF" valign="top" style="padding-bottom:15px;height: 69px;">
                        <span align="justify">{{ $reportsheet->reportsheet_description }}</span>
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
                        <div align="justify" style="padding:3px 0 50px 0;height: 69px;">{{ $reportsheet->reportsheet_correctiveaction }}</div>
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>&nbsp;</td>
                                <td align="left">--------------------------</td>
                                <td align="right">------------------------------------------</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="left" style="font-size:70%"><i>Firma del Reportante</i></td>
                                <td align="right" style="font-size:70%"><i>Seguridad Integral/Medio Ambiente</i></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="left" valign="bottom" style="font-size:50%">Original: Reportante</td>
                                <td align="right" valign="bottom" style="font-size:50%">Copia 1: Jefe de Seguridad Integral/Medio Ambiente (según corresponda)</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="100%" cellpadding="1" cellspacing="1">
                <tr>
                    <td align="left" width="30%"><b>SI-F-116</b></td>
                    <td align="center" width="40%" style="font-size:50%">Hoja de Reporte N° {{ $reportsheet->id }}</td>
                    <td align="right" width="30%"><b>REVISIÓN:00</b></td>
                </tr>
            </table>
        </td>
        <td width="50%">
            <table width="100%" border="0" cellspacing="2" cellpadding="5" bgcolor="#000">
                <tbody>
                <tr>
                    <td valign="middle" align="center" bgcolor="#F2F2F2">
                        <table border="0" width="100%">
                            <tr>
                                <td align="left" width="25%"><img src="{{ url('bqsafety/img/calcesur.png') }}" width="35"></td>
                                <td align="center" width="50%"><b>HOJA DE REPORTE</b></td>
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
                                <td>Accidente Seguridad</td>
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
                                    @if (in_array(4, $classification))
                                        <input type="checkbox" checked>
                                    @else
                                        <input type="checkbox">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Incidente Seguridad</td>
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
                                    @if (in_array(5, $classification))
                                        <input type="checkbox" checked>
                                    @else
                                        <input type="checkbox">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Acto Subestandar</td>
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
                                    @if (in_array(6, $classification))
                                        <input type="checkbox" checked>
                                    @else
                                        <input type="checkbox">
                                    @endif
                                </td>
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
                                <td><b>Fecha:</b> {{ $reportsheet->created_at->toFormattedDateString() }}</td>
                            </tr>
                            <tr>
                                <td><b>Lugar:</b> {{ $reportsheet->location->location_name }} </td>
                                <td><b>Hora:</b> {{ $reportsheet->created_at->format('h:i A') }}</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#F2F2F2" style="padding:7px 0;">
                        <b>FOTO ADJUNTA DEL REPORTE:</b>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF" align="center" style="height: 210.1px; vertical-align: middle">
                        <a target="_blank" href="{{ url('/images/reportsheets/700px/'.$reportsheet->reportsheet_image) }}">
                            <img style="width: 260px; border: 1px solid black" src="{{ url('/images/reportsheets/700px/'.$reportsheet->reportsheet_image) }}" title="Ver">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF" valign="top">
                        <div align="justify" style="padding:3px 0 50px 0;height: 10.2px;"></div>
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>&nbsp;</td>
                                <td align="left">--------------------------</td>
                                <td align="right">------------------------------------------</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="left" style="font-size:70%"><i>Firma del Reportante</i></td>
                                <td align="right" style="font-size:70%"><i>Seguridad Integral/Medio Ambiente</i></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="left" valign="bottom" style="font-size:50%">Original: Reportante</td>
                                <td align="right" valign="bottom" style="font-size:50%">Copia 1: Jefe de Seguridad Integral/Medio Ambiente (según corresponda)</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="100%" cellpadding="1" cellspacing="1">
                <tr>
                    <td align="left" width="30%"><b>SI-F-116</b></td>
                    <td align="center" width="40%" style="font-size:50%">Hoja de Reporte N° {{ $reportsheet->id }}</td>
                    <td align="right" width="30%"><b>REVISIÓN:00</b></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>