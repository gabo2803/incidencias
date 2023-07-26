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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Rondas::all();

        //dd($usuarios);
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
        // dd($request);
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

        //dd( $idronda);
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
