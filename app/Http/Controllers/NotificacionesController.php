<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Dd;

class NotificacionesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:notificaciones-list|incidencias-create|incidencias-edit|incidencias-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:notificaciones-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nnotificacion = Notificacion::count();

        $notificacion = Notificacion::join('supers','supers.id','=','notificacions.responsable')
                                    ->join('users','users.id','=','supers.responsable')
                                    ->join('users as u','u.id','=','notificacions.reporto')
                                    ->join('equipos','equipos.id','=','notificacions.activo')
                                    ->join('incidencias','incidencias.id','=','notificacions.idIncidencia')
                                    ->leftjoin('users as us','us.id','=','incidencias.idAsignadoA')
                                    ->select('notificacions.*','us.primerNombre as nombre','us.primerApellido as apellido','incidencias.id as id_inc')
                                    ->orderby('notificacions.created_at')
                                    ->get();        

        return view('notificaciones.index',compact('notificacion','nnotificacion'));
    }
   
   
    public function destroy(string $id)
    {
        //dd($id);
        Notificacion::find($id)->delete();      
        return response()->json(['success' => 'Notificacion eliminada correctamente']);

    }
}
