@extends('adminlte::page')
@section('title', 'Home Roles')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-right mt-2 mb-2">
                    @can('crear-roles')
                        <a class="btn btn-success" href="{{ route('roles.create') }}"> Nuevo Rol</a>
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
                        <h5 class="pull-left ml-3 mt-2">Total Roles</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stri" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th width="280px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->id }}</td>
                                        <td>{{ $rol->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('roles.show', $rol->id) }}"title="Detalles de rol"><i class="fa-solid fa-eye"></i></a>
                                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                @can('editar-roles')
                                                    <a class="btn btn-sm btn-info ml-1" href="{{ route('roles.edit', $rol->id) }}"title="Editar rol"><i class="fas fa-marker"></i></a>
                                                @endcan
                                                @can('eliminar-roles')
                                                    <form action="{{ route('roles.destroy', $rol->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger ml-1"title="Eliminar rol"><i class="far fa-trash-alt"></i></button>
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
<script src="https://kit.fontawesome.com/715ccab37c.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
