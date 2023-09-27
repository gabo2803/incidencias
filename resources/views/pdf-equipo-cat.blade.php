@extends('layouts.layoutspdf')

@section('content')
@include('layouts.partial.headerpdf')
<br>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre:</th>
            <th>Marca:</th>
            <th>Modelo:</th>
            <th>Tipo de activo:</th>
            <th>Estado:</th>
            <th>Categoria:</th>
            <th>Area:</th>
        </tr>
    </thead>
    <tbody>
        @if($equipos->count()!=0)
        @foreach($equipos as $equipo)
        <tr>
            <td>{{$equipo->descripcion}}</td>
            <td>{{$equipo->marca}}</td>
            <td>{{$equipo->modelo}}</td>
            <td>{{$equipo->tipoActivo}}</td>
            <td>{{$equipo->estado}}</td>
            <td>{{$equipo->nombre}}</td>
            <td>{{$equipo->descripcion}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7">
                <div class="alert alert-warning">No se tienen equipos en esta categoría</div>
            </td>
        </tr>
        @endif
    </tbody>
    
</table>

        

@endsection