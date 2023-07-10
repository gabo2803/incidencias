@extends('adminlte::page')
@section('title', 'create-Cargos')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="float-left  m-2 ">
                    <h2>Nuevo Cargo</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('cargos.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('cargos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-default mt-2">
                <div class="card-header">
                    <h3 class="card-title">Datos del Cargo</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descripion:</label>
                                <input type="text" name="descripcion" class="form-control"
                                    placeholder="Nombre del proveedor" autofocus>                                
                            </div>
                            @error('descripcion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Area:</label>
                                <select name="idArea" id="equipo"
                                class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="" title="Seleccione el equipo">Seleccione el Area</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->description }}</option>
                                @endforeach
                                </select>
                                @error('idArea')
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
