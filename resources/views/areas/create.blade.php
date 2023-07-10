@extends('adminlte::page')
@section('title','crear area')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="float-left  m-2 ">
                <h2>Nuevo Area</h2>
            </div>
            <div class="float-right m-2">
                <a class="btn btn-primary" href="{{ route('areas.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('areas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-default mt-2">
            <div class="card-header">
                <h3 class="card-title">Datos del Area</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descripcion:</label>
                            <input type="text" name="description" class="form-control"
                                placeholder="Nombre del Area" autofocus>                                
                        </div>
                        @error('descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Piso:</label>
                            <select name="piso" id="equipo"
                            class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" title="Seleccione el piso">Seleccione el piso</option>
                            @for ($i=1 ; $i<=7 ; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
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
    <link rel="stylesheet" href="../css/style.css">
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('#mytable').Datatable();
        });   
    </script>
    
@endsection
    
