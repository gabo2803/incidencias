<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Equipos;
use App\Models\Provedores;
use App\Models\Supers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Archivo;
use Illuminate\Support\Facades\File;
use League\Flysystem\Filesystem;
use PhpParser\Node\Stmt\Return_;
use Barryvdh\DomPDF\PDF;

class EquiposController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:equipo-list|equipo-create|equipo-edit|equipo-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:equipo-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:equipo-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:equipo-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $equipos = Equipos::all();
        $supercategoria = Supers::all();
        $nequipos = Equipos::count();        
        return view('equipos.index', compact('equipos', 'supercategoria', 'nequipos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //dd($permission);
        $areas = Areas::all();
        $categorias = Supers::all();
        $proveedores = Provedores::all('id', 'nombre');
        $usuarios = User::all('id', 'primerNombre', 'primerApellido');
        return view('equipos.create', compact('areas', 'categorias', 'proveedores', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'serial' => 'required|unique:equipos,serial',
            'marca' => 'required',
            'modelo' => 'required',
            'servitag',
            'descripcion' => 'required',
            'idProvedor',
            'fechaAdquirido' => 'required',
            'fechaAsignado',
            'garantia',
            'fechaVencGar',
            'idSuperCategoria' => 'required',
            'idArea' => 'required',
            'caracteristicas',
            'precio',
            'idUsuario',
            'estado',
            'tipoActivo',
            'calibracion' => 'required',
            'frecuenciaCal',
            'fechaUltimaCal',
            'riesgo'
        ]);
        if ($request['calibracion'] == 'No') {
            $request['frecuenciaCal'] = null;
            $request['fechaUltimaCal'] = null;
        }
        $input = $request->all();
        //dd($input);
        $equipo = Equipos::create($input);

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                //$archivo=$validation['file'];
                $archivo = new Archivo();
                $archivo->idEquipo = $equipo->id;
                $carpeta = $equipo->id;
                $nombre = $file->getClientOriginalName();
                $archivo->nombre = pathinfo($nombre, PATHINFO_FILENAME);
                $ruta = $carpeta . "/" . $file->getClientOriginalName();
                $contenidoArchivo = File::get($file);
                try {
                    $resultado = Storage::disk('ftp')->put($ruta,  $contenidoArchivo);
                    //return $resultado;
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
                $archivo->ruta = $ruta;
                $archivo->save();
            }
        }
        if ($request['idUsuario']) {
            $equipo->users()->attach($request['idUsuario']);
        }
        return redirect()->route('equipos.index')
            ->with('success', 'Equipo Creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipo = Equipos::find($id);
        $archivos = Archivo::where('idEquipo', $equipo->id)->get();
        $narchivo = count($archivos);
        //dd($narchivo);
        return view('equipos.show', compact('equipo', 'archivos', 'narchivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = Equipos::find($id);
        $proveedores = Provedores::all();
        $categorias = Supers::all();
        $areas = Areas::all();
        $usuarios = User::all('id', 'primerNombre', 'primerApellido');
        $archivos = Archivo::where('idEquipo', $equipo->id)->get();
        //dd( $archivos );

        return view('equipos.edit', compact('equipo', 'proveedores', 'categorias', 'areas', 'usuarios', 'archivos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'serial' => 'required|unique:equipos,serial,' . $id,
            'marca' => 'required',
            'modelo' => 'required',
            'servitag',
            'descripcion',
            'idProvedor',
            'fechaAdquirido' => 'required',
            'fechaAsignado',
            'garantia',
            'fechaVencGar',
            'idSuperCategoria',
            'idArea',
            'caracteristicas',
            'precio',
            'idUsuario',
            'estado',
            'tipoActivo',
            'calibracion' => 'required',
            'frecuenciaCal',
            'fechaUltimaCal',
            'riesgo'
        ]);
        if ($request['calibracion'] == 'No') {
            $request['frecuenciaCal'] = null;
            $request['fechaUltimaCal'] = null;
        }
        $input = $request->all();
        //dd( $input );
        $equipo = Equipos::find($id);
        $equipo->update($input);

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                //$archivo=$validation['file'];
                $archivo = new Archivo();
                $archivo->idEquipo = $equipo->id;
                $carpeta = $equipo->id;
                $nombre = $file->getClientOriginalName();
                $archivo->nombre = pathinfo($nombre, PATHINFO_FILENAME);
                $ruta = $carpeta . "/" . $file->getClientOriginalName();
                $contenidoArchivo = File::get($file);
                try {
                    $resultado = Storage::disk('ftp')->put($ruta,  $contenidoArchivo);
                    //return $resultado;
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
                $archivo->ruta = $ruta;
                $archivo->save();
            }
        }
        if ($request['idUsuario']) {
            $equipo->users()->attach($request['idUsuario']);
        }



        return redirect()->route('equipos.index')
            ->with('success', 'Equipo Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Equipos::find($id)->delete();
        return redirect()->route('equipos.index')
            ->with('success', 'equipos deleted successfully');
    }
}
