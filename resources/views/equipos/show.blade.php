@extends('adminlte::page')
@section('title', 'show-equipos')
@section('content')
    <div class="row">        
        <div class="col-lg-12 margin-tb">
            <div class="d-inline mb-2">
                <h4 class="">Detalles del equipo {{$equipo->id}} {{$equipo->caracteristicas}}</h4>
                <h3 class="btn btn-success" >{{count($equipo->incidencias)}} incidencias Reportadas</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('equipos.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    <div class="card mt-2">        
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Serial:</th>
                        <td>@if($equipo->serial){{$equipo->serial}}@else Sin serial @endif</td>
                        <th>Descripcion:</th>
                        <td>{{$equipo->descripcion}}</td>
                        <th>Caracterisiticas:</th>
                        <td>{{$equipo->caracteristicas}}</td>
                    </tr>
                    <tr>
                        <th>Marca:</th>
                        <td>@if($equipo->marca){{$equipo->marca}}@else No especifica Modelo @endif</td>
                        <th>Modelo:</th>
                        <td>{{$equipo->modelo}}</td>
                        <th>Fecha Adquirido:</th>
                        <td>@if($equipo->fechaAdquirido){{$equipo->fechaAdquirido}}@else No especifica @endif</td>
                    </tr>
                    <tr>
                        <th>Garantia:</th>
                        <td>@if($equipo->garantia){{$equipo->garantia}}@else No especifica @endif</td>
                        <th>Fecha Vencimiento de Garantia:</th>
                        <td>@if($equipo->fechaVencGar){{$equipo->fechaVencGar}}@else No registra @endif</td>
                        <th>Precio:</th>
                        <td>@if($equipo->precio){{$equipo->precio}}@else N/A @endif</td>
                    </tr>
                    <tr>
                        <th>Tipo de Activo:</th>
                        <td>@if($equipo->tipoActivo){{$equipo->tipoActivo}}@else  No especifica @endif</td>
                        <th>Servitag:</th>
                        <td>@if($equipo->servitag){{$equipo->servitag}}@else No especifica  @endif</td>
                        <th>Proveedor:</th>
                        <td>@if($equipo->provedores){{$equipo->provedores->nombre}}@else No especifica proveedor @endif</td>
                    </tr>
                    <tr>
                        <th>Fecha de Asignado:</th>
                        <td>@if($equipo->fechaAsignado){{$equipo->fechaAsignado}}@else No registra @endif</td>
                        <th>Area:</th>
                        <td>@if($equipo->area){{$equipo->area->description}}@else No especifica Area @endif</td>
                        <th>Categoria:</th>
                        <td>@if($equipo->supers){{$equipo->supers->nombre}}@else No especifica Categoria @endif</td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td>@if($equipo->estado){{$equipo->estado}}@else No Especifica @endif</td>
                        <th>Usuarios:</th>
                        <td>@foreach($equipo->users as $user)
                           {{$user->primerNombre}}
                           @endforeach
                        </td>
                        <th>Riesgo:</th>
                        <td>@if($equipo->riesgo){{$equipo->riesgo}}@else No especifica @endif</td>
                    </tr>
                    <tr>
                        <th>Incidencias Reportadas:</th>
                        <td>@if($equipo->incidencias){{count($equipo->incidencias)}}@else No registra incidencia @endif</td>
                        <th>Frecuencia Calibracion:</th>
                        <td>@if($equipo->frecuenciaCal){{$equipo->frecuenciaCal}}@else N/A @endif</td>
                        <th>Fecha Ultima Calibracion:</th>
                        <td>@if($equipo->fechaUltimaCal){{$equipo->fechaUltimaCal}}@else N/A @endif</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/style.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
