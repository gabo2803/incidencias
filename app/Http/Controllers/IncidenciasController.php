<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Incidencias;
use App\Models\Tipos;
use App\Models\Estados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Datatables;
use DB;


class IncidenciasController extends Controller
{
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
        $users = User::where('rol','=','Administrador')->get();
        $tipos = Tipos::all();
        $equipos = Equipos::all();
        $estados = Estados::all();
        return view('incidencias.create',compact('tipos','equipos','estados','users'));
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
            'idTipoIncidencia' => 'required',
            'prioridad' => 'required',
            'idEstado' => 'required',
            'titulo' => 'required',  
            'idAsignadoPor' => 'required',        
            'fechaLimite' => 'required',
            'idAsignadoA' =>'required',
            'descripcion' =>'required',
            'observacion' =>'required'
            
        ]);
        Incidencias::create($request->all());
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
        $users = User::where('rol','=','Administrador')->get();
        
        
        return view('incidencias.edit', compact('incidencia','tipos','equipos','estados','users'));
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
        $request->validate([
            'idUser' => 'required',
            'idEquipo' => 'required',
            'idTipoIncidencia' => 'required',
            'prioridad' => 'required',
            'idEstado' => 'required',
            'titulo' => 'required',  
            'idAsignadoPor' => 'required',        
            'fechaLimite' => 'required',
            'idAsignadoA' =>'required',
            'descripcion' =>'required',
            'observacion' =>'required'
        ]);
        $incidencias = Incidencias::find($id);
        $incidencias->name = $request->name;
        $incidencias->email = $request->email;
        $incidencias->address = $request->address;
        $incidencias->save();
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
