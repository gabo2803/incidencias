@extends('adminlte::page')
@section('title', 'Crear Usuario')
@section('content')

    <div class="contaner mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left  m-2">
                    <h2>Crear Nuevo Usuario</h2>
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
        <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="card card-default mt-2">
                <div class="card-header">
                    <h3 class="card-title">Datos del Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Primer Nombre:</label>
                                <input type="text" name="primerNombre" class="form-control" placeholder="Primer Nombre" value={{old('primerNombre')}}>
                                @error('primerNombre')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Nombre:</label>
                                <input type="text" name="segundoNombre" class="form-control"
                                    placeholder="Segundo Nombre" value={{old('segundoNombre')}}>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primer Apellido:</label>
                                <input type="text" name="primerApellido" class="form-control"
                                    placeholder="Primer Apellido" value={{old('primerApellido')}}>
                                @error('primerApellido')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segundo Apellido:</label>
                                <input type="text" name="segundoApellido" class="form-control"
                                    placeholder="Segundo Apellido" value={{old('segundoApellido')}}>                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" class="form-control" name="password" id=""
                                    aria-describedby="helpId" placeholder="Password" value={{old('password')}}>                               
                            </div>
                            @error('password')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Email" value={{old('email')}}>
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
                                <input type="password" class="form-control" name="confirm-password" id=""
                                    aria-describedby="helpId" placeholder="Confirmar Password" value={{old('confirm-password')}}>                               
                            </div>
                            @error('password')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Sexo:</label>
                                <select name="sexo" id="sexo" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="" title="Seleccione sexo">Seleccione sexo</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>                                                               
                                </select>
                            </div>
                            @error('sexo')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Responsable:</label>
                                <select name="responsable" id="responsable" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="" title="Seleccione sexo">Seleccione una Categoria</option>
                                <option value="null">No es responsable de area</option>
                                @foreach ($supers as $super)
                                    <option value="{{ $super->nombre}}">{{ $super->nombre}}</option>
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
                                    <option value="" title="Seleccione Rol">Seleccione Rol</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol}}">{{ $rol}}</option>
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
                                    <option value="" title="Seleccione cargo">Seleccione Cargo</option>
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->descripcion}}</option>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.select2').select2();
        });
    </script>
@stop
