@extends('adminlte::page')
@section('title', 'index-Notificaciones')
@section('content')
    <div class="container mt-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-head">
                        <h5 class="pull-left ml-3 mt-2">Total notificaciones {{ $nnotificacion }} </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id:</th>
                                    <th>Usuario:</th>
                                    <th>Activo:</th>
                                    <th>Categoria:</th>
                                    <th>Responsable:</th>
                                    <th>Asiganado A:</th>
                                    <th>Fecha/Hora:</th>
                                    <th>Acciones:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notificacion as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->users->primerNombre }} {{ $item->users->primerApellido }}</th>
                                        <td>{{ $item->equipos->descripcion }}</td>
                                        <td>{{ $item->supers->nombre }}</td>
                                        <td>{{ $item->supers->users->primerNombre }}
                                            {{ $item->supers->users->primerApellido }}</td>
                                        <td>
                                            @if ($item->nombre)
                                                {{ $item->nombre }} {{ $item->apellido }}
                                            @else
                                                No asignado
                                            @endif
                                        </td>
                                        <td>{{ $item->incidencias->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                <a class="btn btn-info"
                                                    href="{{ route('incidencias.show', $item->id_inc) }}"title="Detalles de usuario"><i
                                                        class="fa-solid fa-eye"></i></a>
                                                @can('eliminar-notificaciones')
                                                    <a class="btn btn-danger  eliminar"
                                                        href="{{ route('notificaciones.destroy', $item->id) }}"
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
    <script src="js/script.js"></script>
@stop
