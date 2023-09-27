@extends('adminlte::page')
@section('title', 'Mostar Roles')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="float-left m-2">
                    <h2>Detalles de rol</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <h5 class="card-header">Tipo de Rol: {{ $role->name }}</h5>
            <div class="card-body">
                <table class="table table-bordered" style="width: 600px">
                    <thead>
                        <tr>
                            <th>Columna 1</th>
                            <th>Columna 2</th>
                            <!-- Agrega más encabezados de columna si es necesario -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $permissionsArray = $rolePermissions->pluck('name')->toArray(); // Convierte a arreglo
                        $count = count($permissionsArray);
                        $halfCount = ceil($count / 2);
                        $permissionsColumn1 = array_slice($permissionsArray, 0, $halfCount);
                        $permissionsColumn2 = array_slice($permissionsArray, $halfCount, $count - $halfCount);
                        @endphp

                        @for ($i = 0; $i < max($halfCount, $count - $halfCount); $i++)
                        <tr>
                            <td>{{ $permissionsColumn1[$i] ?? '' }}</td>
                            <td>{{ $permissionsColumn2[$i] ?? '' }}</td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

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
