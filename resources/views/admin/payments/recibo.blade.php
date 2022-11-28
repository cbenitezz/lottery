<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="color-scheme" content="light dark">
    </head>
    <style>
        pre {
        display: block;
        font-family: monospace;
        white-space: pre;
        }
        html {
            margin: 0px;
            padding: 0px;
            font-family: 'arial';
            font-size:10px;
            text-align: center;
        }
        table.minimalistBlack {

        width: 80%;
        text-align: center;
        border-collapse: collapse;
        }
        table.minimalistBlack td, table.minimalistBlack th {


        }
        table.minimalistBlack tbody td {
        font-size: 10px;
        }
        table.minimalistBlack tbody td p {
        text-align: center;
        margin: 0;
        padding: 0;
        }
        table.minimalistBlack thead {
        background: #CFCFCF;
        background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        border-bottom: 1px dotted #bbb;
        }
        table.minimalistBlack .line_puntos  {
        background: #CFCFCF;
        background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        border-bottom: 1px dotted #bbb;
        }
        table.minimalistBlack .line_puntos_doble  {
        background: #CFCFCF;
        background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        border-bottom: 1px dotted #bbb;
        border-top: 1px dotted #bbb;
        }
        table.minimalistBlack thead th {
        font-size: 11px;
        font-weight: bold;
        color: #000000;
        text-align: center;
        }
        hr.dotted {
        border-top: 1px dotted #bbb;
        }
        body table{

            margin: 0px auto;
            text-align: center;
        }
    </style>

<body>
    <div>
        <pre>

        <table class="minimalistBlack">
            <thead>
            <tr>
            <th>Estategias Michu</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td class="line_puntos"><p>{{$sede}}</p><p>Nit:{{$nit}}</p><p>{{$fecha}}</p></td></tr>
            <tr>
            <td class="line_puntos"><p>Cajero:   {{$cajero}}</p><p>Recibo:   {{$recibo}}</p></td></tr>
            <tr>
            <td><p>DATOS DEL VENDEDOR</p></td></tr>
            <tr>
            <td class="line_puntos"><p>Cédula: {{$cedula}} | Nombre: {{$nombreVendedor}}</p></td></tr>
            <tr>
            <td><br>
                <table>
                <tr><td>| Sorteo    </td><td>|   Boleta  | </td><td>  Recibo  |</td><td>  Abono </td></tr>
                @foreach ($registro_tabla as $key=>$value)
                <tr><td>{{\Illuminate\Support\Str::limit($value[0],11)}}</td><td>{{$value[1]}}</td><td>{{$value[2]}}</td><td>{{$value[3]}}</td></tr>
                @endforeach
                <tr><td><br></td></tr>
                </table>
            </td></tr>
            <tr><td class="line_puntos_doble">ABONO TOTAL:$ {{$abono}}</td></tr>
            </tbody>

            </table>
        </pre>
    </div>

</body>
</html>
