@extends('adminlte::page')
@section('title', 'Usuarios-show')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Detalles de Usuario</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
           
            <table class="table table-striped ">
                <tbody>
                    <tr >
                        <th>Nombres:</th>
                        <td>{{$usuario->primerNombre}} {{$usuario->segundoNombre}}</td>
                        <th>Apellidos:</th>
                        <td>{{$usuario->primerApellido}} {{$usuario->SegundoApellido}}</td>
                    </tr>
                    <tr >
                        <th>Cargo:</th>                       
                        <td>{{$usuario->cargo->descripcion}}</td>                         
                        <th>Email:</th>
                        <td>{{$usuario->email}}</td>
                    </tr>
                    <tr >
                        <th>Activo:</th>
                        <td>{{$usuario->activo}}</td>
                        <th>Sexo:</th>
                        <td>{{$usuario->sexo}}</td>
                    </tr>
                    

                </tbody>
            </table>
        </div>
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
