@extends('adminlte::page')
@section('title', 'index Equipos')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-right mt-2 mb-2">
                    @can('crear-proveedores')
                        <a class="btn btn-success" href="{{ route('proveedores.create') }}">Crear nuevo Proveedor</a>
                    @endcan
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
                        <h5 class="pull-left ml-3 mt-2">Total Proveedores {{count($proveedores )}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id:</th>
                                    <th>Nombre:</th>
                                    <th>Nit:</th>
                                    <th>Email:</th>
                                    <th>Direccion:</th>
                                    <th>Telefono:</th>
                                    <th>Accion:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td>{{$proveedor->id }}</td>
                                        <td>{{$proveedor->nombre }}</td>
                                        <td>{{$proveedor->nit}}</td>
                                        <td>{{$proveedor->email}}</td>
                                        <td>{{$proveedor->direccion}}</td>
                                        <td>{{$proveedor->telefono}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                <a class="btn btn-sm btn-success" href="{{route('proveedores.show',$proveedor->id)}}"title="Detalles del proveedor"><i class="fa-solid fa-eye"></i></a>

                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                @can('editar-proveedores')
                                                    <a class="btn btn-sm btn-info ml-1" href="{{route('proveedores.edit',$proveedor->id)}}"title="Editar proveedor"><i class="fas fa-marker"></i></a>
                                                @endcan
                                                @can('eliminar-proveedores')
                                                    <form action="{{route('proveedores.destroy',$proveedor->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger ml-1"title="Eliminar proveedor"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                @endcan
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


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/style.css">
@stop

@section('js')
<script src="https://kit.fontawesome.com/715ccab37c.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
