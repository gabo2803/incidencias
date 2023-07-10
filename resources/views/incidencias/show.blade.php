@extends('adminlte::page')
@section('title', 'Incidencias Show')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left mt-2">
                <h2>Detalles incidencia</h2>
            </div>
            <div class="float-right mt-2">
                <a class="btn btn-primary" href="{{ route('incidencias.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Datos de la incidencia</h3>
        </div>
        <div class="card-body">           
            <table class="table table-striped ">
                <tbody>
                    <tr >
                        <th>Equipo:</th>
                        <td>{{$incidencia->equipo->descripcion}}</td>
                        <th>Area:</th>
                        <td>{{{$incidencia->equipo->area->description}}}</td>
                    </tr>
                    <tr >
                        <th>Usuario del equipo:</th>                       
                        <td>
                            @foreach ($incidencia->equipo->users as $item)
                            {{$item->primerNombre}} {{$item->primerApellido}} ({{$item->cargo->descripcion}})  <br>                     
                            @endforeach
                        </td> 
                        
                        <th>Quien reporto:</th>
                        <td>{{$incidencia->asignadoPor->primerNombre}}</td>
                    </tr>
                    <tr >
                        <th>Titulo:</th>
                        <td>{{$incidencia->titulo}}</td>
                        <th>Tipo de evento:</th>
                        <td>{{{$incidencia->tipoIncidencia->descripcion}}}</td>
                    </tr>
                    <tr>
                        <th>Descripcion incidencia:</th>
                        <th>Observacion:</th>
                    </tr>
                    <tr>
                        <td>{{$incidencia->descripcion}}</td>
                        <td colspan="3">{{$incidencia->observacion}}</td>
                    </tr>
                    <tr>
                        <th>Usuario que Asigno:</th>
                        <td>{{$incidencia->user->primerNombre}} {{$incidencia->user->primerApellido}}</td>
                        <th>Asignado a:</th>
                        <td>{{$incidencia->asignadoA->primerNombre}} {{$incidencia->asignadoA->primerApellido}}</td>
                    </tr>
                    <tr>
                        <th>Tipo de incidencia:</th>
                        <td>{{$incidencia->tipoIncidencia->descripcion}}</td>
                        <th>Prioridad:</th>
                        <td>{{$incidencia->prioridad}}</td>
                    </tr>
                    <tr>
                        <th >Observaciones del asignado:</th>
                        <th>Fecha limite asignada para solucion:</th>
                        <td>{{$incidencia->fechaLimite}}</td>
                    </tr>
                    <tr>
                        <td rowspan="2" >{{$incidencia->observacion}}</td>
                        <th>Fecha de reporte:</th>
                        <td colspan="2">{{$incidencia->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Fecha Actualizacion:</th>
                        <td colspan="2">{{$incidencia->updated_at}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/../css/style.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
