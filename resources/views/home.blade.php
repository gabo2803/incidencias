@extends('adminlte::page')

@section('title', 'Home')
@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bienvenid@ al modulo de incidencias  <small class="text-muted">{{ $usuario->primerNombre }} {{$usuario->primerApellido}}</small>
                </h2>
            </div>

        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$cantidadIncidencias}}</h3>
                    <p>Incidencias</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('incidencias.index')}}" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    @if($incidenciasActivas)
                    <h3>{{$incidenciasActivas}}<sup style="font-size: 20px"></sup></h3>
                    <p>Incidencias Asignadas</p>
                    @else
                    <h3>0</h3>
                    <p>No tienes Incidencias Asignada</p>
                    @endif
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$cantidadUser}}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('usuarios.index')}}" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$cantidadEquipos}}</h3>
                    <p>Equipos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Incidencias por Mes</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">{{$cantidadIncidencias}}</span>
                            <span>Cantidad total incidencias</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 12.5%
                            </span>
                            <span class="text-muted">Since last week</span>
                        </p>
                    </div>

                    <div class="position-relative mb-4">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="visitors-chart" height="400" style="display: block; width: 329px; height: 200px;"
                            width="658" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> This Week
                        </span>
                        <span>
                            <i class="fas fa-square text-gray"></i> Last Week
                        </span>
                    </div>
                </div>
            </div>           

        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Cantidad de incidencias por tipos</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                           
                            <span>Tipos de Eventos</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 33.1%
                            </span>
                            <span class="text-muted">Since last month</span>
                        </p>
                    </div>

                    <div class="position-relative mb-4">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="graficaIncidencias" height="400" style="display: block; width: 329px; height: 200px;"
                            width="658" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> This year
                        </span>
                        <span>
                            <i class="fas fa-square text-gray"></i> Last year
                        </span>
                    </div>
                </div>
            </div>           
        </div>
    </div> 




@stop


@section('css')
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('visitors-chart').getContext('2d');
    var monthlySales = @json($monthlySales);   
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(monthlySales),
            datasets: [{
                label: 'Incidencias Mensuales',
                data: Object.values(monthlySales),
                backgroundColor: 'rgba(24,78,130)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
            x: {
                grid: {
                    display: false
                }
            },
            y: {
                grid: {
                    display: false
                }
            }
        }
        }
    });
</script>
<script>
    var ctx = document.getElementById('graficaIncidencias').getContext('2d');
    var data = @json($totalareas);

    var labels = data.map(function(item) {
        return item.area;
    });

    var values = data.map(function(item) {
        return item.total;
    });
    var colors = [
        'rgb(220, 53, 69)',
        'rgb(40, 167, 69)',
        'rgb(255, 193, 7)',
        // Agrega más colores aquí
    ];

    // Crear un array de backgroundColors
    var backgroundColors = colors.slice(0, values.length);

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Incidencias por Áreas',
                data: values,
                backgroundColor: backgroundColors,
                borderColor: colors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
            x: {
                grid: {
                    display: false
                }
            },
            y: {
                grid: {
                    display: false
                }
            }
        }
        }
    });
</script>
@stop
