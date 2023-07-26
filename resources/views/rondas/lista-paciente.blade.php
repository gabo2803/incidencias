@extends('adminlte::page')
@section('title', 'index-Rondas')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('rondas.index') }}"> Atras</a>
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
                        <h5 class="pull-left ml-3 mt-2">Listado de Pacientes </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>

                                    <th>Nombre del paciente:</th>
                                    <th>Identificacion:</th>
                                    <th>Sexo:</th>
                                    <th>Descrip:</th>
                                    <th>Fecha de ingreso:</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $item)
                                    <tr>
                                        <td>{{ $item->Nom1Afil }} {{ $item->Ape1Afil }}</th>
                                        <td>{{ $item->identificacion }}</td>
                                        <td>{{ $item->sexo }}</td>
                                        <td>{{ $item->Descrip }}</td>
                                        <td>{{ $item->FechaHora }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info iten-center"
                                            href="{{ route('rondas.show', $item->identificacion) }}">Crear Ronda</a>
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
    <link rel="stylesheet" href="/../css/style.css">
@stop

@section('js')
    <script src="/../js/script.js"></script>
@stop
