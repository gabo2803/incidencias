@extends('adminlte::page')
@section('title', 'Crear rondas')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="float-left  m-2">
                    <h2>Crear Ronda</h2>
                </div>
                <div class="float-right m-2">
                    <a class="btn btn-primary" href="{{ route('rondas.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <div class="card card-default mt-2">
            <form action="{{ route('rondas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title  text-center">Datos del Paciente</h3>
                </div>
                <div class="card-body">
                    <div class="card-body border color-ron">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Primer Nombre:</label>
                                    <input type="text" name="Nombre1" class="form-control" placeholder="Primer Nombre"
                                        value="{{ $usuario->nombre1 }}" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Segundo Nombre:</label>
                                    <input type="text" name="Nombre2" class="form-control" placeholder="Segundo Nombre"
                                        value="{{ $usuario->nombre2 }}" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Primer Apellido:</label>
                                    <input  type="text" name="apellido1" class="form-control"
                                        placeholder="Primer Apellido" value="{{ $usuario->apellido1 }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Segundo Apellido:</label>
                                    <input  type="text" name="apellido2" class="form-control"
                                        placeholder="Segundo Apellido" value="{{ $usuario->apellido2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Identificacion:</label>
                                    <input disabled type="text" name="Identificacion" class="form-control"
                                        placeholder="Identificacion" value="{{ $usuario->identificacion }}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha de Ingreso:</label>
                                    <input  type="text" name="fechaIngreso" class="form-control"
                                        placeholder="Fecha de ingreso" value="{{ $usuario->FechaHora }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Servicio:</label>
                                    <input  type="text" name="servicio" class="form-control"
                                        placeholder="Servicio" value="{{ $usuario->Descrip }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <input  type="text" name="sexo" class="form-control" placeholder="Sexo"
                                        value="{{ $usuario->sexo == 'M' ? 'Masculino' : 'Femenino' }}">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 color-ron">
                        <h4 class="card-title text-center mt-2 "><strong>Seguridad del paciente</strong></h4>
                        <div class="card-body">
                            <div class="row border">
                                <input type="hidden" name="identificacion" value="{{ $usuario->identificacion }}">
                                <div class="col-md-3 border">
                                    <p for="">Tiene manilla de Identificacion:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Tiene manilla de Identificacion" id="manillasi" value="Si">
                                        <label class="form-check-label" for="manillasi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Tiene manilla de Identificacion" id="manillano"
                                            value="No">
                                        <label class="form-check-label" for="manillano">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border">
                                    <p for="">Requiere otra Manilla:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Requiere otra Manilla"
                                            id="otramanillasi" value="Si">
                                        <label class="form-check-label" for="otramanillasi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Requiere otra Manilla"
                                            id="otramanillano" value="No">
                                        <label class="form-check-label" for="otramanillano">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border">
                                    <p for="">Tablero de Identificacion:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Tablero de Identificacion"
                                            id="tablerosi" value="Si">
                                        <label class="form-check-label" for="tablerosi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Tablero de Identificacion" id="tablerono"
                                            value="No">
                                        <label class="form-check-label" for="tablerono">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border ">
                                    <p>Realizo educacion al Paciente:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Realizo educacion al Paciente" id="EducacionPacientesi" value="Si">
                                        <label class="form-check-label" for="EducacionPaciente">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Realizo educacion al Paciente"
                                            id="EducacionPacienteno" value="No">
                                        <label class="form-check-label" for="EducacionPacienteno">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card color-ron">
                        <h4 class="card-title text-center mt-2"><strong>Medicamento</strong></h4>
                        <div class="card-body">

                            <div class="row border">
                                <div class="col-md-4 border">
                                    <p for="">Explicacion al Paciente del Medicamentos:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Explicacion al Paciente del Medicamentos" id="explicacionsi"
                                            value="Si">
                                        <label class="form-check-label" for="explicacionsi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Explicacion al Paciente del Medicamentos"
                                            id="explicacionno" value="No">
                                        <label class="form-check-label" for="explicacionno">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 border">
                                    <p for="">Identifico y registro alergia del paciente al medicamento:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Identifico y registro alergia del paciente al medicamento"
                                            id="alergiasi" value="Si">
                                        <label class="form-check-label" for="alergiasi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Identifico y registro alergia del paciente al medicamento" id="alergiano"
                                            value="No">
                                        <label class="form-check-label" for="alergiano">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 border">
                                    <p for="">Registro Clinico de la Informacion al Paciente:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Registro Clinico de la Informacion al Paciente" id="registro-clinicosi"
                                            value="Si">
                                        <label class="form-check-label" for="registro-clinicosi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Registro Clinico de la Informacion al Paciente"
                                            id="registro-clinicono" value="No">
                                        <label class="form-check-label" for="registro-clinicono">
                                            No
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card color-ron">
                        <h4 class="card-title text-center mt-2"><strong>Infecciones</strong></h4>
                        <div class="card-body">

                            <div class="row border">
                                <div class="col-md-4 border">
                                    <p for="">Verificacion de la venopuncion:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Verificacion de la venopuncion" id="venopuncionsi" value="Si">
                                        <label class="form-check-label" for="venopuncionsi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Verificacion de la venopuncion"
                                            id="venopuncionno" value="No">
                                        <label class="form-check-label" for="venopuncionno">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 border">
                                    <p for="">Equipos y liquidos marcados:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Equipos y liquidos marcados"
                                            id="liquidos-marcadossi" value="Si">
                                        <label class="form-check-label" for="liquidos-marcadossi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Equipos y liquidos marcados"
                                            id="liquidos-marcadosno" value="No">
                                        <label class="form-check-label" for="liquidos-marcadosno">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 border">
                                    <p for="">Verficacion de cambios de Equipos y Liquidos:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Verficacion de cambios de Equipos y Liquidos" id="cambio-equiposi"
                                            value="Si">
                                        <label class="form-check-label" for="cambio-equiposi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Verficacion de cambios de Equipos y Liquidos"
                                            id="cambio-equipono" value="No">
                                        <label class="form-check-label" for="cambio-equipono">
                                            No
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card color-ron">
                        <h4 class="card-title text-center mt-2"><strong>Riesgo de Caidas</strong></h4>
                        <div class="card-body">

                            <div class="row border">
                                <div class="col-md-3 border">
                                    <p for="">Tiene manilla de caida:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Tiene manilla de caida"
                                            id="manilla-caidasi" value="Si">
                                        <label class="form-check-label" for="manilla-caidasi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Tiene manilla de caida"
                                            id="manilla-caidano" value="No">
                                        <label class="form-check-label" for="manilla-caidano">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border">
                                    <p for="">Registro clinico del riesgo:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Registro clinico del riesgo"
                                            id="registro-clientesi" value="Si">
                                        <label class="form-check-label" for="registro-clientesi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Registro clinico del riesgo"
                                            id="registro-clienteno" value="No">
                                        <label class="form-check-label" for="registro-clienteno">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border">
                                    <p for="">Varandas elevadas:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Varandas elevadas"
                                            id="varandasi" value="Si">
                                        <label class="form-check-label" for="varandasi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Varandas elevadas" id="varandano"
                                            value="No">
                                        <label class="form-check-label" for="varandano">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border ">
                                    <p>Informacion al paciente del riesgo:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Informacion al paciente del riesgo" id="Paciente-riesgosi"
                                            value="Si">
                                        <label class="form-check-label" for="Paciente-riesgosi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Informacion al paciente del riesgo"
                                            id="Paciente-riesgono" value="No">
                                        <label class="form-check-label" for="Paciente-riesgono">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card color-ron">
                        <h4 class="card-title text-center mt-2"><strong>Educacion al paciente</strong></h4>
                        <div class="card-body">
                            <div class="row border">
                                <div class="col-md-3 border">
                                    <p for="">Tiene firmado consentimiento informado:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Tiene firmado consentimiento informado" id="consentiminetosi"
                                            value="Si">
                                        <label class="form-check-label" for="consentiminetosi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Tiene firmado consentimiento informado"
                                            id="consentiminetono" value="No">
                                        <label class="form-check-label" for="consentiminetono">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border">
                                    <p for="">Explico los Riesgos asociados a la atención:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Explico los Riesgos asociados a la atención" id="riesgo-asociadosi"
                                            value="Si">
                                        <label class="form-check-label" for="riesgo-asociadosi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Explico los Riesgos asociados a la atención"
                                            id="riesgo-asociadono" value="No">
                                        <label class="form-check-label" for="riesgo-asociadono">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border">
                                    <p for="">Brindo Informacion sobre los cuidados durante la estancia en la
                                        institución :</<p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Brindo Informacion sobre los cuidados durante la estancia en la institución"
                                            id="cuidado-instanciasi" value="Si">
                                        <label class="form-check-label" for="cuidado-instanciasi">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Brindo Informacion sobre los cuidados durante la estancia en institución"
                                            id="cuidado-instanciano" value="No">
                                        <label class="form-check-label" for="cuidado-instanciano">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border ">
                                    <p>Registro la informacion que se le brindo al paciente:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Registro la informacion que se le brindo al paciente"
                                            id="registro-informacion-pacientesi" value="Si">
                                        <label class="form-check-label" for="registro-informacion-paciente">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="Registro la informacion que se le brindo al paciente" id="registro-informacion-pacienteno"
                                            value="No">
                                        <label class="form-check-label" for="registro-informacion-pacienteno">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Guardar</button>
            </form>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/../../css/style.css">
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
