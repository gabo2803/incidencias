<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Incidencias;
use App\Models\Tipos;
use App\Models\Estados;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Datatables;
use DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\otra;
use Illuminate\Support\Facades\Auth;

class IncidenciasController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:incidencias-list|incidencias-create|incidencias-edit|incidencias-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:incidencias-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:incidencias-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:incidencias-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $incidencias = Incidencias::all();

        return view('incidencias.index', compact('incidencias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $tipos = Tipos::all();
        $equipos = Equipos::all();
        $estados = Estados::all();
        return view('incidencias.create', compact('tipos', 'equipos', 'estados', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'idUser' => 'required',
            'idEquipo' => 'required',
            'idTipoIncidencia' ,
            'prioridad' => 'required',
            'idEstado' ,
            'titulo' => 'required',
            'idAsignadoPor' => 'required',
            'fechaLimite',
            'idAsignadoA',
            'descripcion' => 'required',
            'observacion' ,
            'comentarioSolucion'

        ]);
        $incidencia = Incidencias::create($request->all());
        $equipo = Equipos::find($request->idEquipo);
        $notificacion = new Notificacion();
        $notificacion->reporto = $incidencia->idUser;
        $notificacion->activo = $incidencia->idEquipo;
        $notificacion->idIncidencia = $incidencia->id;
        $notificacion->responsable = $equipo->supers->id;
        $notificacion->save();
        $email = $notificacion->supers->users->email;
        //dd($email);
        $var =  Notification::route('mail', $email)->notify(new otra($incidencia));
        //dd($var);

        return redirect()->route('incidencias.index')
            ->with('success', 'incidencia has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */

    public function show(Incidencias $incidencia)
    {

        return view('incidencias.show', compact('incidencia'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidencias  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencias $incidencias, $id)
    {
        $incidencia = Incidencias::find($id);
        $tipos = Tipos::all();
        $equipos = Equipos::all();
        $estados = Estados::all();
        $users = User::all();


        return view('incidencias.edit', compact('incidencia', 'tipos', 'equipos', 'estados', 'users'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\incidencias  $incidencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idAsignadoAnterior = Incidencias::find($id)->idAsignadoA;
        // dd($request->observacion);
        $request->validate([
            'idUser' => 'required',
            'idEquipo' => 'required',
            'idTipoIncidencia' => 'required',
            'prioridad' => 'required',
            'idEstado',
            'titulo' => 'required|string',
            'idAsignadoPor',
            'fechaLimite',
            'idAsignadoA',
            'descripcion' => 'required|string',
            'observacion'
        ]);
        if ($request->idAsignadoA && $request->idEstado == 1) {
            $request['idEstado'] = 5;
        } elseif ($request->idAsignadoA == null) {
            $request['idEstado'] = 1;
        }

        $comentarioSolucion = Incidencias::find($id)->comentarioSolucion;

        $incidencia = Incidencias::find($id)->update($request->all());

        if ($request['comentarioSolucion'] == '') {
            Incidencias::find($id)->update([
                'comentarioSolucion' => $comentarioSolucion,
                'idAsignadoPor' => Auth::user()->id
            ]);
        } else {
            $fecha = strftime("%d/%m/%Y a las %H:%M", time());
            $comentarioSolucionNuevo = $request['comentarioSolucion'] . " - Comentario de solucion realizada por: " . Auth::user()->primerNombre . " el " . $fecha . ".";
            Incidencias::find($id)->update([
                'comentarioSolucion' => $comentarioSolucion . "\n" . $comentarioSolucionNuevo,
                'idAsignadoPor' => Auth::user()->id
            ]);
        }
        $incidencia = Incidencias::find($id);
        $users = User::where('id', $incidencia->idAsignadoA)->first();
       
        if ($request->idAsignadoA !=  $idAsignadoAnterior && $request->idAsignadoA != Auth::user()->id) {

            dd( $users->email);//Notification::route('mail',$users->email)->notify(new IncidenciasAsignadas($incidencia));

        }

        return redirect()->route('incidencias.index')
            ->with('success', 'incidencias Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Incidencias::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
