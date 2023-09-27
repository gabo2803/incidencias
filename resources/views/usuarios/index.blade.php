@extends('adminlte::page')
@section('title', 'index Usuarios')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-right mt-2 mb-2">
                    @can('crear-usuarios')
                        <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Nuevo usuario</a>
                    @endcan
                </div>
            </div>
        </div>

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
                                        <td style="width: 12%">
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-sm btn-success" href="{{ URL::to('usuarios', $usuario->id) }}"
                                                title="Detalles de usuario"><i class="fa-solid fa-eye"></i></a>
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            @can('editar-usuarios')
                                                <a class="btn btn-sm btn-info" href="{{ route('usuarios.edit', $usuario->id) }}"
                                                    title="Editar usuario"><i class="fas fa-marker"></i></a>
                                            @endcan
                                            @can('eliminar-usuarios')
                                                <a class="btn btn-danger btn-sm eliminar"
                                                    href="{{ route('usuarios.destroy', $usuario->id) }}"
                                                    title="Eliminar usuario"><i class="far fa-trash-alt"></i></a>
                                            @endcan
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
    <script src="https://kit.fontawesome.com/715ccab37c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="js/script.js"></script>
@stop
