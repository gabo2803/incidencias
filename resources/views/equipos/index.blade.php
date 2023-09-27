@extends('adminlte::page')
@section('title', 'index-equipos')
@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 margin-tb">
                <div class="float-left mt-2 mb-2">
                    @can('crear-equipos')
                        <a class="btn btn-success" href="{{ route('equipos.create') }}"> Nuevo equipo</a>
                    @endcan
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 margin-tb ">
                <button type="button" class="btn btn-success dropdown-toggle float-right mt-2 mr-2" data-toggle="dropdown"
                    aria-haspopup="true">
                    Exportar
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <span class="caret"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" style="background: rgb(184, 218, 255);width: 20%">
                    <ul style="list-style-type:none;">
                        <li><a class="dropdown-item" href="{{ url('export-equipos') }}" type="button"
                                style="text-decoration: none;">Todos</a></li>
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=1') }}" type="button"
                                style="text-decoration: none;">Activos</a></li>
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=2') }}" type="button"
                                style="text-decoration: none;">Inactivos</a></li>
                        {{-- <li>Categorías</li> --}}
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=3') }}" type="button"
                                style="text-decoration: none;">Tecnología</a></li>
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=4') }}" type="button"
                                style="text-decoration: none;">Biomédicos</a></li>
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=5') }}" type="button"
                                style="text-decoration: none;">Infraestructura</a></li>
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=6') }}" type="button"
                                style="text-decoration: none;">Otros</a></li>
                        {{-- <li>Tipo de activos</li> --}}
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=7') }}" type="button"
                                style="text-decoration: none;">Leasing</a></li>
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=8') }}" type="button"
                                style="text-decoration: none;">Activo fijo</a></li>
                        <li><a class="dropdown-item" href="{{ url('generar_pdf_clasificado?value=9') }}" type="button"
                                style="text-decoration: none;">Comodato</a></li>
                    </ul>

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
                        <h4 class="pull-left ml-3 mt-2">Total Equipos : {{ $nequipos }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id:</th>
                                    <th>Nombre:</th>
                                    <th>Serial:</th>
                                    <th>Categoria:</th>
                                    <th>Marca Modelo:</th>
                                    <th>Action:</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($equipos as $equipo)
                                    <tr>
                                        <td>{{ $equipo->id }}</td>
                                        <td>{{ $equipo->descripcion }}</td>
                                        <td>{{ $equipo->serial }}</td>
                                        <td>{{ $equipo->supers->nombre }}</td>
                                        <td>{{ $equipo->marca }} {{ $equipo->modelo }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('equipos.show', $equipo->id) }}"title="Detalles de Equipo"><i class="fa-solid fa-eye"></i></a>

                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                @can('editar-equipos')
                                                    <a class="btn btn-sm btn-info ml-1"
                                                        href="{{ route('equipos.edit', $equipo->id) }}"title="Editar Equipo"><i class="fas fa-marker"></i></a>
                                                @endcan
                                                @can('eliminar-equipos')
                                                    <form action="{{ route('equipos.destroy', $equipo->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger ml-1" title="Eliminar Equipo"><i class="far fa-trash-alt"></i></button>
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
