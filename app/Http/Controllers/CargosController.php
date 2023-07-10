<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;
use App\Models\Areas;

class CargosController extends Controller
{   
    function __construct()
    {
        $this->middleware('permission:cargos-list|equipo-create|equipo-edit|equipo-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:cargos-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cargos-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cargos-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargos::all();
        return view('cargos.index',compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Areas::orderBy('description','asc')->get();
        //dd($areas);
        return view('cargos.create',compact('areas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'descripcion'=>'required',
            'idArea'=>'required'
        ]);

        $input = $request->all();
        $cargo = Cargos::create($input);

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo Creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cargo = Cargos::find($id);
        $areas = Areas::orderBy('description','asc')->get();
        return view('cargos.edit',compact('cargo','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'descripcion'=>'required',
            'idArea'=>'required'
        ]);

        $input = $request->all();
        //dd($input);
        $cargo = Cargos::find($id);
        $cargo->update($input);

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cargos::find($id)->delete();
        return response()->json(['success' => 'Cargo eliminado correctamente']);   

    }
}
