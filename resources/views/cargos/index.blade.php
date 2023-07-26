@extends('adminlte::page')
@section('title', 'index-Cargos')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-right mt-2 mb-2">
                    @can('equipo-create')
                        <a class="btn btn-success" href="{{ route('cargos.create') }}"> Nuevo Cargo</a>
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
                        <h5 class="pull-left ml-3 mt-2">Total Cargos {{ count($cargos) }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id:</th>
                                    <th>Descripcion:</th>
                                    <th>Area:</th>
                                    <th>Action:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargos as $cargo)
                                    <tr>
                                        <td>{{ $cargo->id }}</td>
                                        <td>{{ $cargo->descripcion }}</td>
                                        <td>{{ $cargo->area->description }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                @can('cargos-edit')
                                                    <a class="btn btn-sm btn-info"
                                                        href="{{ route('cargos.edit', $cargo->id) }}">Editar</a>
                                                @endcan
                                                @can('cargos-delete')
                                                    <a class="btn btn-danger btn-sm eliminar"
                                                        href="{{ route('cargos.destroy', $cargo->id) }}">Eliminar</a>
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
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@stop
