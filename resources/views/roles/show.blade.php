@extends('adminlte::page')
@section('title', 'Ver rol')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Detalles de rol</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Tipo de Rol: {{$role->name}}</h5>
            <div class="card-body" style="width: 600px">
                <ul class="list-group">
                    @foreach($rolePermissions as $item)
                    <li class="list-group-item">{{$item->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="css/style.css">
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
