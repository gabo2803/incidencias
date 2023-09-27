<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Incidencias;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = Auth::user();
        $monthlySales = Incidencias::selectRaw('DATE_FORMAT(created_at, "%Y-%m") AS month, COUNT(*) AS total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();
            
        $cantidadIncidencias = Incidencias::count();
        $incidenciasActivas = Incidencias::where('idEstado',5)
                                            ->where('idAsignadoA',$usuario->id)
                                            ->count();
        //dd($incidenciasActivas, $usuario->id);
        $cantidadUser = User::count();
        $cantidadEquipos = Equipos::count();

        $totalareas = Incidencias::select('tipos.descripcion as area', DB::raw('count(*) as total'))
                                    ->join('tipos','tipos.id','=','incidencias.idTipoIncidencia')                                    
                                    ->groupBy('area')
                                    ->get();
        //dd( $totalareas);
        return view('home', compact('usuario', 'monthlySales', 'cantidadIncidencias' ,'cantidadUser','cantidadEquipos','incidenciasActivas','totalareas'));
    }
}
