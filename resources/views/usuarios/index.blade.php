@extends('adminlte::page')
@section('title', 'index Usuarios')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">             
                <div class="float-right mt-2 mb-2">
                    <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Nuevo usuario</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-head">
                        <h4 class="pull-left ml-3 mt-2">Total usuarios : {{ count($usuarios) }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id:</th>
                                    <th>Nombres:</th>
                                    <th>Cargo:</th>
                                    <th>Email:</th>
                                    <th>Rol:</th>
                                    <th>Acciones:</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->primerNombre }} {{ $usuario->primerApellido }} </td>
                                        <td>{{ $usuario->cargo->descripcion }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->rol }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ URL::to('usuarios', $usuario->id) }}">Ver</a>

                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                                                    <a  class="btn btn-danger btn-sm eliminar_user"
                                                    href="{{ route('usuarios.destroy',$usuario->id) }}"
                                                    >Eliminar</a>

                                            </div>
                                        </th>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="js/script.js"></script>
@stop
