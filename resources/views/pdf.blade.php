<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Orden de Servicio</title>

    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
           
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        .table-header {
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
        }

        .table-header td {
            
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
        }

        .table-header th {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
        }

        .table-header .img {
            text-align: center
        }

        .table-header .title {
            font-weight: bold;
            text-align: center
        }

        
    </style>

</head>

<body>
    <div class="card mt-2">
        <div class="card-body">
            <table class="table-header" style="undefined;table-layout: fixed;  background-color: white;">
                <colgroup>
                  <col style="width: 100px">
                  <col style="width: 400px">
                  <col style="width: 100px">
                </colgroup>
                  <tr>
                    <th class="img" rowspan="3"><img src="imagenes/eslogan.png" width="140" height="70" title="Perfect Body Medical Center" alt="Perfect Body logo"></th>
                    <th class="title" rowspan="3" colspan="3">PERFECT BODY MEDICAL CENTER<br>SISTEMA DE GESTIÓN Y GARANTÍA DE LA CALIDAD</th>
                    <th >Página: 01</th>
                  </tr>
                  <tr>
                    <td >Version: 01</td>
                  </tr>
                  <tr>
                    <td >Fecha: {{$fechaActual}}</td>
                  </tr>
                </table>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Serial:</th>
                        <td>
                            @if ($equipo->serial)
                                {{ $equipo->serial }}
                            @else
                                Sin serial
                            @endif
                        </td>
                        <th>Descripcion:</th>
                        <td>{{ $equipo->descripcion }}</td>
                        <th>Caracterisiticas:</th>
                        <td>{{ $equipo->caracteristicas }}</td>
                    </tr>
                    <tr>
                        <th>Marca:</th>
                        <td>
                            @if ($equipo->marca)
                                {{ $equipo->marca }}
                            @else
                                No especifica Modelo
                            @endif
                        </td>
                        <th>Modelo:</th>
                        <td>{{ $equipo->modelo }}</td>
                        <th>Fecha Adquirido:</th>
                        <td>
                            @if ($equipo->fechaAdquirido)
                                {{ $equipo->fechaAdquirido }}
                            @else
                                No especifica
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Garantia:</th>
                        <td>
                            @if ($equipo->garantia)
                                {{ $equipo->garantia }}
                            @else
                                No especifica
                            @endif
                        </td>
                        <th>Fecha Vencimiento de Garantia:</th>
                        <td>
                            @if ($equipo->fechaVencGar)
                                {{ $equipo->fechaVencGar }}
                            @else
                                No registra
                            @endif
                        </td>
                        <th>Precio:</th>
                        <td>
                            @if ($equipo->precio)
                                {{ $equipo->precio }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tipo de Activo:</th>
                        <td>
                            @if ($equipo->tipoActivo)
                                {{ $equipo->tipoActivo }}
                            @else
                                No especifica
                            @endif
                        </td>
                        <th>Servitag:</th>
                        <td>
                            @if ($equipo->servitag)
                                {{ $equipo->servitag }}
                            @else
                                No especifica
                            @endif
                        </td>
                        <th>Proveedor:</th>
                        <td>
                            @if ($equipo->provedores)
                                {{ $equipo->provedores->nombre }}
                            @else
                                No especifica proveedor
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de Asignado:</th>
                        <td>
                            @if ($equipo->fechaAsignado)
                                {{ $equipo->fechaAsignado }}
                            @else
                                No registra
                            @endif
                        </td>
                        <th>Area:</th>
                        <td>
                            @if ($equipo->area)
                                {{ $equipo->area->description }}
                            @else
                                No especifica Area
                            @endif
                        </td>
                        <th>Categoria:</th>
                        <td>
                            @if ($equipo->supers)
                                {{ $equipo->supers->nombre }}
                            @else
                                No especifica Categoria
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td>
                            @if ($equipo->estado)
                                {{ $equipo->estado }}
                            @else
                                No Especifica
                            @endif
                        </td>
                        <th>Usuarios:</th>
                        <td>
                            @foreach ($equipo->users as $user)
                                {{ $user->primerNombre }}
                            @endforeach
                        </td>
                        <th>Riesgo:</th>
                        <td>
                            @if ($equipo->riesgo)
                                {{ $equipo->riesgo }}
                            @else
                                No especifica
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Incidencias Reportadas:</th>
                        <td>
                            @if ($equipo->incidencias)
                                {{ count($equipo->incidencias) }}
                            @else
                                No registra incidencia
                            @endif
                        </td>
                        <th>Frecuencia Calibracion:</th>
                        <td>
                            @if ($equipo->frecuenciaCal)
                                {{ $equipo->frecuenciaCal }}
                            @else
                                N/A
                            @endif
                        </td>
                        <th>Fecha Ultima Calibracion:</th>
                        <td>
                            @if ($equipo->fechaUltimaCal)
                                {{ $equipo->fechaUltimaCal }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if ($narchivo != 0)
            <div class="card-footer text-muted">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Archivo:</th>
                            <th>Action:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($archivos as $archivo)
                            <tr>
                                <td>{{ $archivo->nombre }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a target="_blank" class="btn btn-small btn-success"
                                            href="{{ url('verArchivo', $archivo->id) }}"> ver</a>
                                        <a class="btn btn-small btn-info"
                                            href="{{ url('descargarArchivo', $archivo->id) }}">descargar</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <span class="border  text-success m-2">
                <p class="m-2"> El equipo no registra archivos</p>
            </span>
        @endif
    </div>
</body>

</html>
