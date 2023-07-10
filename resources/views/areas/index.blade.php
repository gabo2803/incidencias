@extends('adminlte::page')
@section('title','index-areas')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-right mt-2 mb-2">
                <a href="{{route('areas.create')}}" class="btn btn-success">Nueva Area</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif 
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-head">
                    <h5 class="pull-left ml-3 mt-2">
                        Total Areas {{count($areas)}}
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>id:</th>
                                <th>Descripcion:</th>
                                <th>Piso:</th>
                                <th>Acciones:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                            <tr>
                                <td>{{$area->id}}</td>
                                <td>{{$area->description}}</td>
                                <td>{{$area->piso}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    
                                            <a class="btn btn-small btn-info"
                                                href="{{ route('areas.edit',$area->id) }}">Editar</a>
                                 
                                   
                                        <a class="btn btn-danger btn-info eliminar"
                                            href="{{ route('areas.destroy',$area->id) }}"
                                            >Eliminar</a>                                                    
                                                                       </div>
                                </td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="css/style.css">
@stop
@section('js')
<script>
    $(document).ready(function (){
        $('#myTable').DataTable();
    });
</script>
    
@endsection