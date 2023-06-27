@extends('adminlte::page')
@section('title', 'index-equipos')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Listado de equipos</h2>
                </div>
                <div class="float-right mt-2 mb-2">
                    @can('equipo-create')
                        <a class="btn btn-success" href="{{ route('equipos.create') }}"> Nuevo equipo</a>
                    @endcan
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-head">
                        <h5 class="pull-left ml-3 mt-2">Total Equipos {{ $nequipos }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id:</th>
                                    <th>Nombre:</th>
                                    <th>Serial:</th>
                                    <th>Categoria:</th>
                                    <th>Marca Modelo:</th>
                                    <th>Action:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipos as $equipo)
                                    <tr>
                                        <td>{{$equipo->id }}</td>
                                        <td>{{$equipo->descripcion }}</td>
                                        <td>{{$equipo->serial}}</td>
                                        <td>{{$equipo->supers->nombre}}</td>
                                        <td>{{$equipo->marca}} {{$equipo->modelo}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                <a class="btn btn-small btn-success" href="{{route('equipos.show',$equipo->id)}}">Show</a>

                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                @can('equipo-edit')
                                                    <a class="btn btn-small btn-info" href="{{route('equipos.edit',$equipo->id)}}">Edit</a>
                                                @endcan
                                                @can('equipo-delete')
                                                    <form action="#" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-small btn-danger">delete</button>
                                                    </form>
                                                @endcan
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
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
