@extends('adminlte::page')
@section('title', 'index-Rondas')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left mt-2">
                <h2>Detalle Ronda</h2>
            </div>
            <div class="float-right mt-2">
                <a class="btn btn-primary" href="{{ route('rondas.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Datos del paciente:</b></h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nombres:</th>
                        <td>{{$ronda->AfiNombre1}} {{$ronda->AfiNombre2}}</td>
                        <th>Apellidos:</th>
                        <td>{{$ronda->AfiApellido1}} {{$ronda->AfiApellido2}}</td>
                    </tr>
                    <tr>
                        <th>Identificación:</th>
                        <td>{{$ronda->cedulaPaciente}}</td>
                        <th>Sexo:</th>
                        <td>{{$ronda->sexo}}</td>
                    </tr>
                    <tr>
                        <th>Fecha de realizada:</th>
                        <td>{{$ronda->fechaIngreso}}</td>
                        <th>Quien Realizo:</th>
                        <td>{{$ronda->user->primerNombre}} {{$ronda->user->primerApellido}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Preguntas y Respuestas</b></h5>
                
            </div>
            <div class="card-footer">
                <div>                    
                    @if(count($preguntas) > 0)
                    <table class="table table-striped">
                        <tbody>
                            @foreach($preguntas as $item)
                            <tr>
                                <td style="width: 50%" >{{$item->pregunta}}:</td>
                                <td style="text-align: center width: 50%">{{$item->respuesta}}</td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No hay preguntas disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
            
        
    </div>
    
</div>


@stop
@section('css')
    <link rel="stylesheet" href="css/style.css">
@stop

@section('js')
    <script src="js/script.js"></script>
@stop
