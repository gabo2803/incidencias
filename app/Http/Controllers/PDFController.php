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


class PDFController extends Controller
{

    public function generarPDF($id)
    {

        // Obtener los datos necesarios para el PDF
        $equipo = Equipos::find($id);
        $archivos = Archivo::where('idEquipo', $equipo->id)->get();
        $narchivo = count($archivos);
        $fechaActual = Carbon::now()->format('d/m/Y');

        $pdf = PDF::loadView('pdf',  compact('equipo','archivos','narchivo','fechaActual'));
        // Establecer el formato de papel como horizontal (paisaje)
        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('itsolutionstuff.pdf');      
                
        
    }
}
