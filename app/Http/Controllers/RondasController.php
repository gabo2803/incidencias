<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\PreguntasRespuestas;
use App\Models\Rondas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RondasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:listar-rondas|eliminar-rondas|crear-rondas|editar-rondas', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-rondas',['only'=>['create','store']]);
        $this->middleware('permission:eliminar-rondas', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Rondas::all();        
        return view('rondas.index', compact('usuarios'));
    }
    

    public function graficas()
    {
        return view('rondas.graficas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = DB::connection('sios')->table('Pacientes as p')
            ->join('CasosActivos as c', 'p.id', '=', 'c.Paciente')
            ->leftjoin('unidades as u', 'u.Codigo', 'c.UnidadFuncionalActual')
            ->select('p.identificacion', 'p.sexo',  'p.Nom1Afil', 'p.Ape1Afil', 'u.Descrip', 'c.FechaHora')
            ->orderBy('c.FechaHora')->get();
        return view('rondas.lista-paciente', compact('usuarios'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $messages = [
            'Tiene_manilla_de_Identificacion.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Requiere_otra_Manilla.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Tablero_de_Identificacion.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Realizo_educacion_al_Paciente.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Explicacion_al_Paciente_del_Medicamentos.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Identifico_y_registro_alergia_del_paciente_al_medicamento.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Registro_Clinico_de_la_Informacion_al_Paciente.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Verificacion_de_la_venopuncion.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Equipos_y_liquidos_marcados.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Verficacion_de_cambios_de_Equipos_y_Liquidos.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Tiene_manilla_de_caida.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Registro_clinico_del_riesgo.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Varandas_elevadas.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Informacion_al_paciente_del_riesgo.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Tiene_firmado_consentimiento_informado.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Explico_los_Riesgos_asociados_a_la_atención.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Brindo_Informacion_sobre_los_cuidados_durante_la_estancia_en_la_institución.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            'Registro_la_informacion_que_se_le_brindo_al_paciente.required' => 'El campo es requerido, debes seleccionar una opción. "Si o NO"',
            // Puedes agregar más mensajes personalizados aquí para otras validaciones si es necesario
        ];
        $this->validate($request,[
            'Tiene_manilla_de_Identificacion' => 'required|in:Si,No',
            'Requiere_otra_Manilla' => 'required|in:Si,No',
            'Tablero_de_Identificacion' => 'required|in:Si,No',
            'Realizo_educacion_al_Paciente' => 'required|in:Si,No',
            'Explicacion_al_Paciente_del_Medicamentos' => 'required|in:Si,No',
            'Identifico_y_registro_alergia_del_paciente_al_medicamento'  => 'required|in:Si,No',
            'Registro_Clinico_de_la_Informacion_al_Paciente'=> 'required|in:Si,No',
            'Verificacion_de_la_venopuncion'=> 'required|in:Si,No',
            'Equipos_y_liquidos_marcados'=>'required|in:Si,No',
            'Verficacion_de_cambios_de_Equipos_y_Liquidos'=> 'required|in:Si,No',
            'Tiene_manilla_de_caida'=> 'required|in:Si,No',
            'Registro_clinico_del_riesgo'=> 'required|in:Si,No',
            'Varandas_elevadas'=> 'required|in:Si,No',
            'Informacion_al_paciente_del_riesgo'=> 'required|in:Si,No',
            'Tiene_firmado_consentimiento_informado'=> 'required|in:Si,No',
            'Explico_los_Riesgos_asociados_a_la_atención'=> 'required|in:Si,No',
            'Brindo_Informacion_sobre_los_cuidados_durante_la_estancia_en_la_institución'=> 'required|in:Si,No',
            
            'Registro_la_informacion_que_se_le_brindo_al_paciente'=> 'required|in:Si,No',
        ],$messages); 
         //dd($request);
        $ronda = new Rondas();
        $ronda->cedulaPaciente = $request->input("identificacion");
        $ronda->AfiNombre1 = $request->input("Nombre1");
        $ronda->AfiNombre2 = $request->input("Nombre2");
        $ronda->AfiApellido1 = $request->input("apellido1");
        $ronda->AfiApellido2 = $request->input("apellido2");
        $ronda->sexo = $request->input("sexo");
        $ronda->descripcion = $request->input("servicio");
        $ronda->fechaIngreso = $request->input("fechaIngreso");
        $ronda->idUsuario = Auth::user()->id;
        $ronda->save();

       

        $idronda = $ronda->id;
        $respuestas = $request->except('_token', 'identificacion', 'Nombre1', 'Nombre2', 'apellido1', 'apellido2', 'sexo', 'servicio', 'fechaIngreso'); // Obtener todas las respuestas excepto el campo _token

        //dd( $respuestas);
        // Iterar sobre las respuestas recibidas
        foreach ($respuestas as $pregunta => $respuesta) {
            // Crear un nuevo registro de Respuesta en la base de datos
            $pregunta_respuesta = new PreguntasRespuestas();
            $pregunta_respuesta->respuesta = $respuesta;
            $pregunta_respuesta->pregunta = $pregunta;
            $pregunta_respuesta->idRonda = $idronda;
            //dd($pregunta_respuesta);
            $pregunta_respuesta->save();
        }
        return redirect()->route('rondas.index')
            ->with('success', 'Ronda Guardada exitosamente!.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ronda = Rondas::where('cedulaPaciente',$id)->first();
        if($ronda != NULL){
            // Obtener la fecha actual sin la hora
        $fechaActual = Carbon::now()->setTime(0, 0, 0);

        // Convertir la fecha "2023-07-24 19:13:18" a un objeto de tipo Carbon y eliminar la hora
        $fechaComparar = Carbon::parse($ronda->created_at)->setTime(0, 0, 0);

        //dd($fechaActual,$fechaComparar);

        if ($fechaComparar->eq($fechaActual)) {
            // La fecha "2023-07-24" es igual a la fecha actual
            return redirect()->route('rondas.index')
                    ->with('success', 'El paciente ya tiene realizada la ronda del dia de hoy');
        } 
        }
        

        $usuario = DB::connection('sios')->table('Pacientes as p')
            ->join('CasosActivos as c', 'p.id', '=', 'c.Paciente')
            ->leftjoin('unidades as u', 'u.Codigo', 'c.UnidadFuncionalActual')
            ->select('p.identificacion', 'p.sexo',  'p.Nom1Afil as nombre1', 'p.Nom2Afil as nombre2', 'p.Ape1Afil as apellido1', 'p.Ape2Afil as apellido2', 'u.Descrip', 'c.FechaHora')
            ->where('p.identificacion', $id)->first();

        return view('rondas.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        $ronda = Rondas::find($id);
        //dd($ronda);
        $preguntas = PreguntasRespuestas::where('idRonda', $ronda->id)->get();
        // dd($preguntas);

        return view('rondas.edit', compact('ronda', 'preguntas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rondas::find($id)->delete();
        return redirect()->route('rondas.index')
            ->with('success', 'Ronda eliminada exitosamente');
    }
    
}
