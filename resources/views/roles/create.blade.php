@extends('adminlte::page')
@section('title', 'Crear Roles')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left m-2">
                    <h2>Crear rol</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Crear Rol</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Nombre del rol">
                                @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @foreach ($permission as $value)
                            <div class="form-check">                                
                                <input class="form-check-input" name="permission[]" type="checkbox" value="{{$value->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault"> {{ $value->name }}                             
                                </label> 
                            </div>                          
                            @endforeach    
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
        });
    </script>
@stop
