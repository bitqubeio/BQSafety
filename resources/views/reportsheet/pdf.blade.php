<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reporte</title>
</head>
<style>
    body {
        font-size: 25px;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    .wraper {
        width: 90%;
        margin: 0 auto;
        padding: 1rem;
    }

    .table {
        border: 3px solid #000;
        width: 100%;
        border-collapse: collapse;
    }

    .thead {
        background: #e7e7e7;
    }

    tr {
        border-bottom: 3px solid #000;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 1rem 0;
    }

    ul li {
        padding: .3rem 0;
    }

    input {
        width: 1.3rem;
        text-align: center;
        font-weight: bold;
        border: 3px solid;
        font-size: 1.1rem;
    }

    h4 {
        margin: .6rem;
        text-align: center;
    }

    p {
        margin: .5rem;
    }

    p span {
        margin: .5rem 0;
    }
</style>

<body>
<div class="wraper">
    <table class="table">
        <thead class="thead">
        <tr>
            <th style="position:relative">

                <h3>HOJA DE REPORTE</h3></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="display:flex;justify-content: space-around;">
                <ul>
                    <li>Accidente Seguridad</li>
                    <li>Incidente Seguridad</li>
                    <li>Acto Subestandar</li>
                </ul>
                <ul style="margin-left: -13rem;">
                    <li>
                        <input type="text" value="✓">
                    </li>
                    <li>
                        <input type="text" value="✓">
                    </li>
                    <li>
                        <input type="text" value="✓">
                    </li>
                </ul>
                <ul>
                    <li>Accidente Ambiental</li>
                    <li>Incidente Ambiental</li>
                    <li>Condición Subestandar</li>
                </ul>
                <ul style="margin-left: -13rem;">
                    <li>
                        <input type="text" value="✓">
                    </li>
                    <li>
                        <input type="text" value="✓">
                    </li>
                    <li>
                        <input type="text" value="✓">
                    </li>
                </ul>
            </td>
        </tr>
        <tr class="thead">
            <td>
                <h4>Datos de la persona que reporta</h4></td>
        </tr>
        <tr>
            <td>
                <p><b>Nombres y apellidos: </b>Nombre Nombre Apellido Apellido</p>
                <p><span style="float:left;width:60%; display:block"><b>Empresa: </b>Nombre de la empresa. </span><span style="float:left;width:40%; display:block"><b>Cargo: </b>Cargo de la persona</span></p>
                <p><span style="float:left;width:60%; display:block"><b>Área: </b>áre del trabajador. </span><span style="float:left;width:40%; display:block"><b>Fecha: </b>15/05/2017</span></p>
                <p><span style="float:left;width:60%; display:block"><b>Lugar: </b>lugar del trabajador. </span><span style="float:left;width:40%; display:block"><b>Hora: </b>15:48</span></p>
            </td>
        </tr>
        <tr class="thead">
            <td>
                <h4>Descripción del reporte</h4>
                <p style="text-align:center; font-size:70%">
                    ¿Dónde y cómo ocurrio el evento? ¿Qué estaba haciendo la persona durante el evento? ¿Qué sucedió inesperadamente?. De preferencia colocar el nombre del afectado si corresponde.
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, rem. Omnis eius recusandae quod non! Quis officia, fugiat quaerat, alias cupiditate eligendi adipisci molestias animi ipsa pariatur excepturi a nihil!</p>
            </td>
        </tr>
        <tr class="thead">
            <td>
                <h4>Acción correctiva</h4>
                <p style="text-align:center; font-size:70%">
                    Colocar las acciones que se tomaron en el momento según corresponda.
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, rem. Omnis eius recusandae quod non! Quis officia, fugiat quaerat, alias cupiditate eligendi adipisci molestias animi ipsa pariatur excepturi a nihil!</p>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:100%; height:40px;"></div>
                <p style="text-align:center"><span style="float:left;width:50%; display:block">______________________________</span><span style="float:left;width:50%; display:block">______________________________</span></p>
                <p style="text-align:center"><span style="float:left;width:50%; display:block;font-size:70%">Firma del Reportante</span><span style="float:left;width:50%; display:block;font-size:70%">Seguridad Integral/Medio Ambiente</span></p>
                <p style="font-size:70%">Original: Reportante Copia 1: Jefe de Seguridad Integral/Medio Ambiente (según corresponda)</p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-size:80%; font-weight:bold"><span style="float:left;width:50%; display:block; text-align:left">SI-F-116</span><span style="float:left;width:50%; display:block; text-align:right">REVISIÓN:00</span></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>

</html>