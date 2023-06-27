@extends('adminlte::page')
@section('title', 'create-equipos')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="float-left  m-2 ">
                    <h2>Nuevo Equipo</h2>
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
        <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-default mt-2">
                <div class="card-header">
                    <h3 class="card-title">Datos del Equipo</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Serial:</label>
                                <input type="text" name="serial" class="form-control"
                                    placeholder="Serial del Equipo" autofocus>                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Marca:</label>
                                <input type="text" name="marca" class="form-control"
                                    placeholder="Marca del Equipo">
                                @error('marca')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Modelo:</label>
                                <input type="text" name="modelo" class="form-control"
                                    placeholder="Modelo del Equipo">
                                @error('modelo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Servitag:</label>
                                <input type="text" name="servitag" class="form-control"
                                    placeholder="Service tag o producto">                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Descripcion o Nombre:</label>
                                <input type="text" name="descripcion" class="form-control"
                                    placeholder="Descripcion o Nombre del Equipo">                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Proveedor:</label>
                                <select name="idProvedor" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Proveedor del equipo">
                                        Seleccione proveedor del equipo</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">
                                            {{$proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha Adquirido:</label>
                                <input type="date" name="fechaAdquirido" class="form-control"
                                    placeholder="Fecha de Adquirido el Equipo">
                                @error('fechaAdquirido')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha Asignado:</label>
                                <input type="date" name="fechaAsignado" class="form-control"
                                    placeholder="Fecha Asignado">                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Garantia:</label>
                                <input type="text" name="garantia" class="form-control"
                                    placeholder="Garantia del Equipo">                               
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha Vencimiento Garantia:</label>
                                <input type="date" name="fechaVencGar" class="form-control"
                                    placeholder="fecha Vencimiento Garantia del Equipo">                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Categoria:</label>
                                <select name="idSuperCategoria" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Categoria del equipo">
                                       Seleccione Categoria del Equipo</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">
                                            {{$categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Area:</label>
                                <select name="idArea" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Area del equipo">
                                        Seleccione Area del equipo</option>
                                    <option value="">-----------piso 1-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 1)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                        @endif    
                                    @endforeach
                                    <option value="">-----------piso 2-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 2)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                            @endif     
                                    @endforeach
                                    <option value="">-----------piso 2-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 2)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                            @endif 
                                    @endforeach
                                    <option value="">-----------piso 3-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 3)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                            @endif 
                                    @endforeach
                                    <option value="">-----------piso 4-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 4)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                            @endif 
                                    @endforeach
                                    <option value="">-----------piso 5-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 5)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                            @endif 
                                    @endforeach
                                    <option value="">-----------piso 6-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 6)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                            @endif 
                                    @endforeach
                                    <option value="">-----------piso 7-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 7)
                                        <option value="{{ $area->id }}">
                                            {{ $area->description }}</option>
                                            @endif 
                                    @endforeach
                                    <option value="">-----------piso 8-----------</option>    
                                    @foreach ($areas as $area)
                                        @if($area->piso == 8)
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
                                <textarea class="form-control" placeholder="Caracterisitica del Equipo" id="caracteristicas"
                                    name="caracteristicas" style="height: 125px"></textarea>                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Valor:</label>
                                <input type="text" name="precio" class="form-control"
                                    placeholder="valor del Equipo">                                
                            </div>
                            <div class="form-group">
                                <label>Usuario:</label>
                                <select name="idUsuario" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Seleccione un usuario del Equipo">
                                        Seleccione usuario del equipo</option>  
                                        @foreach($usuarios as $usuario)                                  
                                        <option value="{{$usuario->id}}">{{$usuario->primerNombre}} {{$usuario->primerApellido}}</option> 
                                        @endforeach
                                                                             
                                </select>                                 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estado:</label>
                                <select name="estado" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Estado de Equipo">
                                        Seleccione Estado del equipo</option>                                    
                                        <option value="Activo">Activo</option> 
                                        <option value="Inactivo">Inactivo</option>
                                                                             
                                </select>                        
                            </div><div class="form-group">
                                <label>Tipo de activo:</label>
                                <select name="tipoActivo" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Tipo de activo">
                                        Seleccione Tipo de activo</option>                                    
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
                                    <option selected="selected" data-select2-id="3" title="Tipo de activo">
                                    Seleccione una opcion:</option>
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
                                    placeholder="Frecuencia en meses">  
                                                                  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha de Ultima Calibracion:</label>
                                <input type="date" name="fechaUltimaCal" class="form-control"
                                    placeholder="Fecha ultima cilibracion">
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Riesgo:</label>
                                <select name="riesgo" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3" title="Tipo de riesgo">
                                    Seleccione un topo de Riesgo:</option>
                                    <option value="I">I</option>
                                    <option value="IIA">IIA</option>
                                    <option value="IIB">IIB</option>
                                    <option value="III">III</option>
                                </select>                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Subir archivos del equipo</label>
                                <input class="btn btn-success" class="form-control" type="file" id="file" 
                                name="file[]"  multiple>
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
    <link rel="stylesheet" href="css/style.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.select2').select2();           
        });
    </script>
@stop
