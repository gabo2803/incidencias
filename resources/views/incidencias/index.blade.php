@extends('adminlte::page')
@section('title', 'Home')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Lista de Incidencias</h2>
                </div>
                <div class="pull-right mb-2">
                    @can('incidencias-create')
                    <a class="btn btn-success" href="{{ route('incidencias.create') }}"> Nueva Incidencia</a>
                    @endcan
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
                        <th>Titulo</th>
                        <th>Equipo</th>
                        <th>Reporto</th>
                        <th>Encargado</th>
                        <th>Estado</th>
                        <th>Prioridad</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidencias as $incidencia)
                        <tr>
                            <td>{{ $incidencia->id }}</td>
                            <td>{{ $incidencia->titulo }}</td>
                            <td>{{ $incidencia->equipo->descripcion }}</td>
                            <td>{{ $incidencia->user->primerNombre }}</td>
                            <td>{{ $incidencia->idAsignadoA}}</td>
                            <td>{{ $incidencia->estado->descripcion }}</td>
                            <td>{{ $incidencia->prioridad }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-small btn-success"
                                        href="{{ route('incidencias.show',$incidencia->id) }}">Show</a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    @can('incidencias-edit')
                                    <a class="btn btn-small btn-info"
                                        href="{{ route('incidencias.edit',$incidencia->id)}}">Edit</a>
                                    @endcan    
                                    @can('incidencias-delete')  
                                    <form action="{{ route('incidencias.destroy',$incidencia->id) }}" method="post">
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-small btn-danger">delete</button>
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
