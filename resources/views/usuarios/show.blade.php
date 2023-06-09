@extends('adminlte::page')
@section('title', 'Usuarios-show')
@section('content')




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
