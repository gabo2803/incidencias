@extends('adminlte::page')
@section('title', 'index-Rondas')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">   
                <div class="float-right mr-2">             
                <a class="btn btn-success " href="{{ route('rondas.create') }}"> Nueva ronda</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3 ">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin: 10px;">
                    <div class="card-head">
                        <h5 class="pull-left ml-3 mt-2">Listado de Rondas </h5><a class="btn btn-success ml-4" href="{{ url('graficos') }}">Ver Graficas</a> 
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    
                                    <th >Nombre del paciente:</th>
                                    <th >Identificacion:</th>
                                    <th >Sexo:</th>
                                    <th >Descrip:</th>
                                    <th >Fecha:</th>
                                    <th >Quien Realizo:</th>
                                    <th >Acciones:</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $item)                               
                                    <tr>                                      
                                        <td>{{ $item->AfiNombre1 }} {{ $item->AfiApellido1 }}</th>
                                        <td>{{ $item->cedulaPaciente }}</td>
                                        <td>{{ $item->sexo }}</td>
                                        <td>{{ $item->descripcion }}</td>                                                                                    
                                        <td>{{ $item->fechaIngreso}}</td>
                                        <td title="">{{$item->user->primerNombre}} {{$item->user->primerApellido}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                <a class="btn btn-sm btn-info"
                                                    href="{{route('rondas.edit',$item->id)}}">Detalles</a>
                                                <form action="{{route('rondas.destroy',$item->id)}}" class="d-inline" method="post">
                                                @method('DELETE')
                                                @csrf  
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>  
                                                </form>    
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@stop
