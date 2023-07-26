<?php

namespace App\Http\Controllers;

use App\Models\PreguntasRespuestas;
use App\Models\Rondas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function generarGrafico()
    {
        $npacientes = Rondas::count();

        $preguntas1 = ['Tiene_manilla_de_Identificacion', 'Requiere_otra_Manilla', 'Tablero_de_Identificacion', 'Realizo_educacion_al_Paciente'];
        $respuestas1 = ['Sí' => [], 'No' => []];

        foreach ($preguntas1 as $pregunta) {
            $respuestas1['Si'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'Si')->count();
            $respuestas1['No'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'No')->count();
        }

        $preguntas2 = ['Explicacion_al_Paciente_del_Medicamentos', 'Identifico_y_registro_alergia_del_paciente_al_medicamento', 'Registro_Clinico_de_la_Informacion_al_Paciente'];
        $respuestas2 = ['Sí' => [], 'No' => []];

        foreach ($preguntas2 as $pregunta) {
            $respuestas2['Si'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'Si')->count();
            $respuestas2['No'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'No')->count();
        }

        $preguntas3 = ['Verificacion_de_la_venopuncion', 'Equipos_y_liquidos_marcados', 'Verficacion_de_cambios_de_Equipos_y_Liquidos'];
        $respuestas3 = ['Sí' => [], 'No' => []];

        foreach ($preguntas3 as $pregunta) {
            $respuestas3['Si'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'Si')->count();
            $respuestas3['No'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'No')->count();
        }
        $preguntas4 = ['Tiene_manilla_de_caida', 'Registro_clinico_del_riesgo', 'Varandas_elevadas'];
        $respuestas4 = ['Sí' => [], 'No' => []];

        foreach ($preguntas4 as $pregunta) {
            $respuestas4['Si'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'Si')->count();
            $respuestas4['No'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'No')->count();
        }
        $preguntas5 = ['Tiene_firmado_consentimiento_informado', 'Explico_los_Riesgos_asociados_a_la_atención', 'Brindo_Informacion_sobre_los_cuidados_durante_la_estancia_en_la_institución', 'Registro_la_informacion_que_se_le_brindo_al_paciente'];
        $respuestas5 = ['Sí' => [], 'No' => []];

        foreach ($preguntas5 as $pregunta) {
            $respuestas5['Si'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'Si')->count();
            $respuestas5['No'][] = PreguntasRespuestas::where('pregunta', $pregunta)->where('respuesta', 'No')->count();
        }

       
        return view('grafico.grafico', compact(
            'npacientes',
            'preguntas1',
            'respuestas1',
            'preguntas2',
            'respuestas2',
            'preguntas3',
            'respuestas3',
            'preguntas4',
            'respuestas4',
            'preguntas5',
            'respuestas5'
        ));
    }
}
