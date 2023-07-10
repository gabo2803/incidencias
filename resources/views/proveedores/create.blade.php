@extends('adminlte::page')
@section('title', 'Crear Proveedores')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left  m-2 ">
                    <h2>Nuevo Proveedor</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('proveedores.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-default mt-2">
                <div class="card-header">
                    <h3 class="card-title">Datos del proveedor</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="nombre" class="form-control"
                                    placeholder="Nombre del proveedor" autofocus>                                
                            </div>
                            @error('nombre')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Emaildel proveedor">
                                @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nit:</label>
                                <input type="text" name="nit" class="form-control"
                                    placeholder="Descripcion o Nombre del Equipo">  
                                    @error('nit')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror                                 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Direccion:</label>
                                <input type="text" name="direccion" class="form-control"
                                placeholder="Direccion del proveedor">
                                @error('direcccion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telefono:</label>
                                <input type="text" name="telefono" class="form-control"
                                    placeholder="telefono del proveedor">
                                @error('telefono')
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
            //$('#myTable').DataTable();
            //$('.select2').select2();           
        });
    </script>
@stop
