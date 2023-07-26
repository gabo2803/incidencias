@extends('adminlte::page')
@section('title', 'Editar Usuario')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left m-2">
                    <h2>Editar Usuario</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('usuarios.index') }}">Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif        
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="post" >
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Datos del Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Primer Nombre:</label>
                                <input type="text" name="primerNombre" class="form-control" placeholder="Primer Nombre"
                                    value="{{ $usuario->primerNombre }}">
                                @error('primerNombre')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Nombre:</label>
                                <input type="text" name="segundoNombre" class="form-control" placeholder="Segundo Nombre"
                                    value="{{ $usuario->segundoNombre }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primer Apellido:</label>
                                <input type="text" name="primerApellido" class="form-control"
                                    placeholder="Primer Apellido" value="{{ $usuario->primerApellido }}">
                                @error('primerApellido')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Apellido:</label>
                                <input type="text" name="segundoApellido" class="form-control"
                                    placeholder="Segundo Apellido" value="{{ $usuario->segundoApellido }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input readonly="readonly" type="password" class="form-control" name="password"
                                    id="" aria-describedby="helpId" placeholder="Password"
                                    value="{{ $usuario->password }}">
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Email"
                                    value="{{ $usuario->email }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Confirmar Password:</label>
                                <input readonly="readonly" type="password" class="form-control" name="confirm-password"
                                    id="" aria-describedby="helpId" placeholder="Confirmar Password"
                                    value="{{ $usuario->password }}">
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Sexo:</label>
                                <select name="sexo" id="sexo" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="{{ $usuario->sexo }}" title="Seleccione sexo">
                                        {{ $usuario->sexo }} (actual)</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Responsable:</label>
                                <select name="responsable" id="responsable"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value=@if ($responsable) {{ $responsable->id }} @else "" @endif>
                                        @if ($responsable == null)
                                            No aplica
                                        @else
                                            {{ $responsable->nombre }} (Actual)
                                        @endif
                                    </option>
                                    @foreach ($supers as $super)
                                        <option value="{{ $super->id }}">{{ $super->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Rol:</label>
                                <select name="roles" id="rol"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option
                                        value="@foreach ($userroles as $rol) {{ $rol }}" @endforeach title="Seleccione
                                        Rol">
                                        @foreach ($userroles as $rol)
                                            {{ $rol }} (actual)
                                        @endforeach
                                    </option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol }}">{{ $rol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Cargo:</label>
                                <select name="idCargo" id="cargo"
                                    class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="{{ $usuario->idCargo }}" title="Seleccione cargo">
                                        {{ $usuario->cargo->descripcion }} (actual)</option>
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
                                    @endforeach
                                </select>
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
<script src="js/script.js"></script>
@stop
