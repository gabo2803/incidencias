@extends('adminlte::page')
@section('title', 'Crear incidencia')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="float-left  m-2">
                    <h2>Reportar incidencia</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('incidencias.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('incidencias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-default mt-2">
                <div class="card-header">
                    <h3 class="card-title">Reportar incidencia</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group" title="Usuario que reporta">
                                <strong>Us</strong>
                                <input type="text" name="idUser" class="form-control" value="{{ Auth::user()->id }}"
                                    readonly="readonly" required>
                                <input type="hidden" name="idAsignadoPor" class="form-control"
                                    value="{{ Auth::user()->id }}">
                                @error('idUser')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Equipo:</strong>
                                <select name="idEquipo" id="equipo"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="" title="Seleccione el equipo">Seleccione el equipo</option>
                                    @foreach ($equipos as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error('idEquipo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Tipo de Evento:</strong>
                                <select name="idTipoIncidencia" id="evento"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    <option value="" title="Seleccione el tipo">Seleccionar tipo de evento</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error('idTipoIncidencia')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Prioridad:</strong>
                                <select name="prioridad" id="prioridad"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="3" tabindex="-1" aria-hidden="true">
                                    <option value="" title="Seleccionar Prioridad">Seleccionar Prioridad</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Media">Media</option>
                                    <option value="Baja">Baja</option>
                                </select>
                                @error('prioridad')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" data-select2-id="30">
                            <div class="form-group">
                                <strong>Estado:</strong>
                                <input type="text" class="form-control" readonly="readonly"
                                    placeholder="Estado incidencia de la Incidencia" value="{{ $estado->descripcion }}">
                                <input type="hidden" name="idEstado" id="estado" value="{{ $estado->id }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Titulo:</strong>
                                <input type="text" name="titulo" class="form-control"
                                    placeholder="Titulo de la Incidencia">
                                @error('titulo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Fecha de solucion:</strong>
                                <input class="form-control" type="date" name="fechaLimite" id="fechaSolucion"
                                    title="Fecxha de solucion">
                            </div>
                        </div>
                        <div class="col-md-3" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Asignado para solucion:</strong>
                                <select name="idAsignadoA" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" value="" data-select2-id="3" title="Asignado para dar solucion">
                                        Asignado para dar solucion</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->primerNombre }}
                                            {{ $user->primerApellido }}</option>
                                    @endforeach
                                </select>
                                @error('idAsignadoA')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Descripcion:</label>
                                <textarea name="descripcion"class="form-control" placeholder="Descripcion de la incidencia" id="descripcion"
                                    name="description" style="height: 100px"></textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Observacion:</label>
                                <textarea name="observacion" class="form-control" placeholder="Observacion de la incidencia" id="observacion"
                                    name="observacion" style="height: 100px"></textarea>
                                @error('observacion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Guardar</button>
    </div>

    </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/../../css/style.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.select2').select2();
        });
    </script>
@stop
