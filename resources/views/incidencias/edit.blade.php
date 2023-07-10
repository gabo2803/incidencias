@extends('adminlte::page')
@section('title', 'Editar incidencia')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="float-left mt-2">
                    <h2>Editar Incidencia</h2>
                </div>
                <div class="float-right mt-2">
                    <a class="btn btn-primary " href="{{ route('incidencias.index') }}">Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('incidencias.update', $incidencia->id) }}" method="post">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Datos del Equipo</h3>
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
                                <select readonly="readonly" name="idEquipo" id="equipo"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="{{ $incidencia->equipo->id }}" title="Seleccione el equipo">
                                        {{ $incidencia->equipo->descripcion }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Tipo de Evento:</strong>
                                <select name="idTipoIncidencia" id="evento"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    <option value="{{ $incidencia->tipoIncidencia->id }}" title="Seleccione el tipo">
                                        {{ $incidencia->tipoIncidencia->descripcion }} (actual)</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Prioridad:</strong>
                                <select name="prioridad" id="prioridad"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="3" tabindex="-1" aria-hidden="true">
                                    <option value="{{ $incidencia->prioridad }}" title="Seleccionar Prioridad">
                                        {{ $incidencia->prioridad }}</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Media">Media</option>
                                    <option value="Baja">Baja</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Estado:</strong>
                                <select name="idEstado" id="estado"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="{{ $incidencia->estado->id }}" title="Seleccione Estado">
                                        {{ $incidencia->estado->descripcion }}</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Titulo:</strong>
                                <input type="text" name="titulo" class="form-control"
                                    placeholder="Titulo de la Incidencia" readonly="readonly"
                                    value="{{ $incidencia->titulo }}">
                                @error('titulo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Fecha de solucion:</strong>
                                <input class="form-control" type="date" name="fechaLimite" id="fechaSolucion"
                                    title="Fecxha de solucion" value="{{ $incidencia->fechaLimite }}">
                            </div>
                        </div>
                        <div class="col-md-3" data-select2-id="30">
                            <div class="form-group" data-select2-id="29">
                                <strong>Asignado para solucion:</strong>
                                <select name="idAsignadoA" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Asignado para dar solucion"
                                        value="{{ $incidencia->asignadoA->id }}">
                                        {{ $incidencia->asignadoA->primerNombre }}
                                        {{ $incidencia->asignadoA->primerApellido }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->primerNombre }}
                                            {{ $user->primerApellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Descripcion:</label>
                                <textarea readonly="readonly" class="form-control" placeholder="Descripcion de la incidencia" id="descripcion"
                                    name="descripcion" style="height: 100px">{{ $incidencia->descripcion }}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Observacion:</label>
                                <textarea readonly="readonly" name="observacion" class="form-control" placeholder="Observacion de la incidencia"
                                    id="observacion" name="observacion" style="height: 100px">{{ $incidencia->observacion }}</textarea>
                                @error('observacion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Ultimo comentario:</label>
                                <textarea readonly="readonly" class="form-control" placeholder="Comentario Solucion" id="comentario"
                                    name="comentario" style="height: 100px">{{ $incidencia->comentarioSolucion }}</textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Nuevo comentario:</label>
                                <textarea name="comentarioSolucion" class="form-control" placeholder="Observacion de la incidencia" id="observacion"
                                    style="height: 100px"></textarea>
                                @error('comentarioSolucion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Guardar</button>
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/../css/style.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.select2').select2();
        });
    </script>
@stop
