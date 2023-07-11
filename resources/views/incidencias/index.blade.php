@extends('adminlte::page')
@section('title', 'Home')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">                
                <div class="float-right mt-2 mb-2">
                    @can('incidencias-create')
                        <a class="btn btn-success" href="{{ route('incidencias.create') }}"> Nueva incidencia</a>
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
                        <h4 class="pull-left ml-3 mt-2">Total incidencias {{ count($incidencias) }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
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
                                        <td>{{ $incidencia->idAsignadoA }}</td>
                                        <td>
                                            {{ $incidencia->estado->descripcion }}




                                        </td>
                                        <td style="text-align: center">
                                            @if ($incidencia->prioridad == 'Alta')
                                                <img src="{{ asset('imagenes/alta32.png') }}" alt="Prioridad Alta"
                                                    title="Prioridad Alta">
                                            @elseif($incidencia->prioridad == 'Media')
                                                <img src="{{ asset('imagenes/media32.png') }}" alt="Prioridad Media"
                                                    title="Prioridad Media">
                                            @else($incidencia->prioridad=='Baja')
                                                <img src="{{ asset('imagenes/baja32.png') }}" alt="Prioridad Baja"
                                                    title="Prioridad Baja">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('incidencias.show', $incidencia->id) }}">Show</a>

                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                @can('incidencias-edit')
                                                    <a class="btn btn-sm btn-info"
                                                        href="{{ route('incidencias.edit', $incidencia->id) }}">Edit</a>
                                                @endcan
                                                @can('incidencias-delete')
                                                    <form action="{{ route('incidencias.destroy', $incidencia->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
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
