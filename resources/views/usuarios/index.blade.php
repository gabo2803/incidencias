@extends('adminlte::page')
@section('title', 'Usuarios')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Lista de Usuarios</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Crear usuarios</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->primerNombre }}</td>
                            <td>{{ $usuario->cargo->descripcion }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->rol }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-small btn-success"
                                        href="{{ URL::to('usuarios/' . $usuario->id) }}">Show</a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-small btn-info"
                                        href="{{ URL::to('usuarios/' . $usuario->id . '/edit') }}">Edit</a>
                                    <a class="btn btn-small btn-danger"
                                        href="{{ URL::to('usuarios/' . $usuario->id . '/destroy') }}">Delete</a>
                                </div>



                                </th>
                        </tr>
                    @endforeach
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
