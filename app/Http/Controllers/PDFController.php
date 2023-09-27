<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipos;
use App\Models\Supers;
use App\Models\Archivo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;



class PDFController extends Controller
{

    public function pdfEquipo($id)
    {
        // Obtener los datos necesarios para el PDF
        $equipo = Equipos::find($id);
        $archivos = Archivo::where('idEquipo', $equipo->id)->get();
        $narchivo = count($archivos);
        $fechaActual = Carbon::now()->format('d/m/Y');

        $pdf = PDF::loadView('pdf-equipo',  compact('equipo','archivos','narchivo','fechaActual'));
        // Establecer el formato de papel como horizontal (paisaje)
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('Descripcion-equipo.pdf');
    }

    public function pdfCategoria(Request $request)
    {
        $value = $request->value;

        if($value == 0){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 1){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('estado','Activo')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 2){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('idSuperCategoria','Inactivo')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 3){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('idSuperCategoria','1')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 4){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('idSuperCategoria','2')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 5){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('idSuperCategoria','3')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 6){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('estado','4')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 7){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('tipoActivo','Leasing')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 8){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('tipoActivo','Activo fijo')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        if($value == 9){
            $nequipos = Equipos::count();
            $equipos = DB::table('equipos as e')
                     ->join('supers as s', 'e.idSuperCategoria', '=', 's.id')
                     ->join('areas as a','e.idArea','=','a.id')
                     ->select('e.*','s.nombre as nombre','a.description as descripcion')
                     ->where('tipoActivo','Comodato')
                     ->orderby('e.marca','asc')
                     ->get();
        }
        //dd( $equipos);
        $fechaActual = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('pdf-equipo-cat',  compact('nequipos','fechaActual','equipos'));
        // Establecer el formato de papel como horizontal (paisaje)
        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('Listado-equipo.pdf');
    }


}
