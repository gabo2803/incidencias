<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function subirArchivo()
    {
        if($request->hasFile('file'))
        {
            foreach($request->file('file') as $file)
            {
                $validation = $request->validate([
                    'file.*' => 'required|file|mimetypes:pdf,docx|max:2048000'
                ]);
                   
                   $archivo=$validation['file'];
                   $archivo= new Archivo();
                   $archivo->idEquipo=$equipo->id;
                   $carpeta=$equipo->id;
                   $nombre=$file->getClientOriginalName();
                   $archivo->nombre = pathinfo($nombre,PATHINFO_FILENAME);
                   $ruta=$carpeta."/".$file->getClientOriginalName();
                   $contenidoArchivo = file_get_contents($file);
                   Storage::disk('local')->put($ruta,  $contenidoArchivo );
                   $archivo->ruta=$ruta;
                   $archivo->save();
           
            }
        }
    }
}
