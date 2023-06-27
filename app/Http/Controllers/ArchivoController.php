<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;

class ArchivoController extends Controller
{
    public function descargarArchivo($id)
    {
        dd($id);
        $archivo = Archivo::find($id);
        $rutaArchivo = "//192.168.1.223/ANEXOS_PRUEBA/" . $archivo->ruta;
        return response()->download($rutaArchivo);
    }

    public function verArchivo($id)
    {
        $archivo = Archivo::find($id);
        $rutaArchivo = "//192.168.1.223/ANEXOS_PRUEBA/" . $archivo->ruta;
        return response()->file($rutaArchivo);
    }

    public function eliminarArchivo($id)
    {
        //dd($id);
        $archivo = Archivo::find($id);
        $rutaArchivo =  $archivo->ruta;
       

            Storage::disk('ftp')->delete($rutaArchivo);
            $archivo->delete();
            return response()->json(['mensaje' => 'ojo Archivo eliminado correctamente']);
       


        //return redirect()->route('equipos.index',$archivo->idEquipo)
        // ->with('success', 'Archivo eliminado exitosamente');
    }
}
