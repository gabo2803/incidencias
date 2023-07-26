@extends('adminlte::page')
@section('title', 'Graficos de rondas')
@section('content')
    <div class="container">        
        <div class="row">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Lista de Chequeo Seguridad del paciente</h3>                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg"></span>
                                <span>Seguridad del paciente</span>
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
                            <canvas id="encuestasChart" height="400" style="display: block; width: 329px; height: 200px;"
                                width="658" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Si
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> No
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Lista de Chequeo infecciones</h3>                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg"></span>
                                <span>Infecciones</span>
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
                            <canvas id="encuestasChart2" height="400" style="display: block; width: 329px; height: 200px;"
                                width="658" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Si
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> No
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Lista de Chequeo Educacion al paciente</h3>                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg"></span>
                                <span>Educacion al paciente</span>
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
                            <canvas id="encuestasChart4" height="400" style="display: block; width: 329px; height: 200px;"
                                width="658" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Si
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> No
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">la Lista de Chequeo Medicamento</h3>                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg"></span>
                                <span>Medicamento</span>
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
                            <canvas id="encuestasChart1" height="400" style="display: block; width: 329px; height: 200px;"
                                width="658" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Si
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> No
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Lista de Chequeo Riesgo de caidas</h3>                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg"></span>
                                <span>Riesgo de caidas </span>
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
                            <canvas id="encuestasChart3" height="400" style="display: block; width: 329px; height: 200px;"
                                width="658" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Si
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> No
                            </span>
                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('encuestasChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($preguntas1),
            datasets: [
                {
                    label: 'Si',
                    data: @json($respuestas1['Si']),
                    backgroundColor: 'rgb(0, 123, 255)',
                    borderWidth: 1
                },
                {
                    label: 'No',
                    data: @json($respuestas1['No']),
                    backgroundColor: 'rgb(108, 117, 125)',
                    borderWidth: 1
                }
            ]
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
    var ctx = document.getElementById('encuestasChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($preguntas2),
            datasets: [
                {
                    label: 'Si',
                    data: @json($respuestas2['Si']),
                    backgroundColor: 'rgb(0, 123, 255)',
                    borderWidth: 1
                },
                {
                    label: 'No',
                    data: @json($respuestas2['No']),
                    backgroundColor: 'rgb(108, 117, 125)',
                    borderWidth: 1
                }
            ]
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
    var ctx = document.getElementById('encuestasChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($preguntas3),
            datasets: [
                {
                    label: 'Si',
                    data: @json($respuestas3['Si']),
                    backgroundColor: 'rgb(0, 123, 255)',
                    borderWidth: 1
                },
                {
                    label: 'No',
                    data: @json($respuestas3['No']),
                    backgroundColor: 'rgb(108, 117, 125)',
                    borderWidth: 1
                }
            ]
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
    var ctx = document.getElementById('encuestasChart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($preguntas4),
            datasets: [
                {
                    label: 'Si',
                    data: @json($respuestas4['Si']),
                    backgroundColor: 'rgb(0, 123, 255)',
                    borderWidth: 1
                },
                {
                    label: 'No',
                    data: @json($respuestas4['No']),
                    backgroundColor: 'rgb(108, 117, 125)',
                    borderWidth: 1
                }
            ]
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
    var ctx = document.getElementById('encuestasChart4').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($preguntas5),
            datasets: [
                {
                    label: 'Si',
                    data: @json($respuestas5['Si']),
                    backgroundColor: 'rgb(0, 123, 255)',
                    borderWidth: 1
                },
                {
                    label: 'No',
                    data: @json($respuestas5['No']),
                    backgroundColor: 'rgb(108, 117, 125)',
                    borderWidth: 1
                }
            ]
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
