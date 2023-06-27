@extends('adminlte::page')
@section('title', 'edit-equipos')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left  m-2 ">
                    <h2>Editar equipo {{ $equipo->id }}</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('equipos.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('equipos.update', $equipo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="card card-default mt-2">
                <div class="card-header">
                    <h3 class="card-title">Datos del Equipo</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Serial:</label>
                                <input type="text" name="serial" class="form-control" placeholder="Serial del Equipo"
                                    value="{{ $equipo->serial }}" autofocus>
                                @error('serial')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Marca:</label>
                                <input type="text" name="marca" class="form-control" placeholder="Marca del Equipo"
                                    value="{{ $equipo->marca }}">
                                @error('marca')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Modelo:</label>
                                <input type="text" name="modelo" class="form-control" placeholder="Modelo del Equipo"
                                    value="{{ $equipo->modelo }}">
                                @error('modelo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Servitag:</label>
                                <input type="text" name="servitag" class="form-control"
                                    placeholder="Service tag o producto" value="{{ $equipo->servitag }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Descripcion o Nombre:</label>
                                <input type="text" name="descripcion" class="form-control"
                                    placeholder="Descripcion o Nombre del Equipo" value="{{ $equipo->descripcion }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Proveedor:</label>
                            <select name="idProvedor" class="form-control select2 select2-hidden-accessible"
                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="3" title="Proveedor del equipo"
                                    value="@if ($equipo->provedores) {{ $equipo->provedores->id }}@else "" @endif">
                                    @if ($equipo->provedores)
                                        {{ $equipo->provedores->nombre }} actual
                                    @else
                                        No especifica proveedor
                                    @endif
                                </option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">
                                        {{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha Adquirido:</label>
                                <input type="date" name="fechaAdquirido" class="form-control"
                                    placeholder="Fecha de Adquirido el Equipo" value="{{ $equipo->fechaAdquirido }}">
                                @error('fechaAdquirido')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha Asignado:</label>
                                <input type="date" name="fechaAsignado" class="form-control" placeholder="Fecha Asignado"
                                    value="{{ $equipo->fechaAsignado }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Garantia:</label>
                                <input type="text" name="garantia" class="form-control" placeholder="Garantia del Equipo"
                                    value="{{ $equipo->garantia }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha Vencimiento Garantia:</label>
                                <input type="date" name="fechaVencGar" class="form-control"
                                    placeholder="fecha Vencimiento Garantia del Equipo"
                                    value="{{ $equipo->fechaVencGar }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Categoria:</label>
                                <select name="idSuperCategoria" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Categoria del equipo"
                                        value="@if ($equipo->supers) {{ $equipo->supers->id }}@else "" @endif">
                                        @if ($equipo->supers)
                                            {{ $equipo->supers->nombre }} (actual)
                                        @else
                                            No especifica Categoria
                                        @endif
                                    </option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">
                                            {{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Area:</label>
                                <select name="idArea" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Area del equipo"
                                        value="@if ($equipo->area) {{ $equipo->area->id }}@else "" @endif">
                                        @if ($equipo->area)
                                            {{ $equipo->area->description }} (actual)
                                        @else
                                            No especifica Categoria
                                        @endif
                                    </option>
                                    <option value="">-----------piso 1-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 1)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 2-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 2)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 2-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 2)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 3-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 3)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 4-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 4)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 5-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 5)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 6-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 6)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 7-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 7)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach
                                    <option value="">-----------piso 8-----------</option>
                                    @foreach ($areas as $area)
                                        @if ($area->piso == 8)
                                            <option value="{{ $area->id }}">
                                                {{ $area->description }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Caracteristicas:</label>
                                <textarea class="form-control" placeholder="Caracterisitica del Equipo" id="caracteristicas" name="caracteristicas"
                                    style="height: 125px">{{ $equipo->caracteristicas }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Valor:</label>
                                <input type="text" name="precio" class="form-control" placeholder="valor del Equipo"
                                    value="{{ $equipo->precio }}">
                            </div>
                            <div class="form-group">
                                <label>Usuario:</label>
                                <select name="idUsuario" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3"
                                        title="Seleccione un usuario del Equipo" value="">
                                    </option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->primerNombre }}
                                            {{ $usuario->primerApellido }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estado:</label>
                                <select name="estado" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Estado de Equipo"
                                        value="{{ $equipo->estado }}">
                                        {{ $equipo->estado }}</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tipo de activo:</label>
                                <select name="tipoActivo" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Tipo de activo"
                                        value="{{ $equipo->tipoActivo }}">
                                        {{ $equipo->tipoActivo }} (Actual)</option>
                                    <option value="Activo fijo">Activo fijo</option>
                                    <option value="Leasing">Leasing</option>
                                    <option value="Comodato">Comodato</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>¿Requiere Calibracion?:</label>
                                <select name="calibracion" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Tipo de activo"
                                        value="{{ $equipo->calibracion }}">
                                        {{ $equipo->calibracion }} (Actual)</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                                @error('calibracion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fracuencia de Calibracion:</label>
                                <input type="number" name="frecuenciaCal" class="form-control"
                                    placeholder="Frecuencia en meses" value="{{ $equipo->frecuenciaCal }}">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha de Ultima Calibracion:</label>
                                <input type="date" name="fechaUltimaCal" class="form-control"
                                    placeholder="Fecha ultima cilibracion" value="{{ $equipo->fechaUltimaCal }}">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Riesgo:</label>
                                <select name="riesgo" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Tipo de riesgo"
                                        value="{{ $equipo->riesgo }}">
                                        {{ $equipo->riesgo }}</option>
                                    <option value="I">I</option>
                                    <option value="IIA">IIA</option>
                                    <option value="IIB">IIB</option>
                                    <option value="III">III</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Subir archivos del equipo</label>
                                <input class="btn btn-success" class="form-control" type="file" id="file"
                                    name="file[]" multiple>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Archivo:</th>
                                        <th>Action:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archivos as $archivo)
                                        <tr>
                                            <td>{{ $archivo->nombre }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a target="_blank" class="btn btn-small btn-success"
                                                        href="{{ url('verArchivo', $archivo->id) }}"> ver</a>
                                                    <a class="btn btn-small btn-info"
                                                        href="{{ url('descargarArchivo', $archivo->id) }}">descargar</a>

                                                    <a id="eliminar" class="btn btn-danger btn-info"
                                                        href="{{ route('eliminar_archivo', $archivo->id) }}"
                                                        class="eliminar-archivo">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </form>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="css/style.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#eliminar').click(function(event) {
                event.preventDefault();
                
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción eliminará el archivo permanentemente.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    
                    if (result.isConfirmed) {
                        // Aquí puedes llamar a la función para eliminar el archivo

                        alert(result.isConfirmed)


                    } else {
                        // Aquí puedes manejar la situación en la que se cancela la eliminación del archivo
                        // Por ejemplo, puedes mostrar un mensaje o realizar alguna otra acción
                        console.log('Se canceló la eliminación del archivo');
                    }
                });

            });

        });
    </script>
@stop
