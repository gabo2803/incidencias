@extends('adminlte::page')
@section('title', 'show-equipos')
@section('content')
    <div class="row">        
        <div class="col-lg-12 ">
            <div class="float-left mt-2">
                <h4 class="">Detalles del Proveedor{{$proveedor->id}}</h4>                
            </div>
            <div class="float-right mb-2 mt-2">
                <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    <div class="card card-default">        
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nombre:</th>
                        <td>@if($proveedor->nombre){{$proveedor->nombre}}@else No reporta Nombre @endif</td>
                        <th>Nit:</th>
                        <td>@if($proveedor->nit){{$proveedor->nit}}@else No reporta Nit @endif</td>
                        <th>Correo:</th>
                        <td>@if($proveedor->email){{$proveedor->email}}@else No reporta Email @endif</td>
                    </tr>
                    <tr>
                        <th>Direccion:</th>
                        <td>@if($proveedor->email){{$proveedor->email}}@else No reporta Email @endif</td>
                        <th>Telefono:</th>
                        <td>@if($proveedor->email){{$proveedor->email}}@else No reporta Email @endif</td>
                        
                    </tr>                    
                </tbody>
            </table>
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
