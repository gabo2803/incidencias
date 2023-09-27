<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\User;

class CargosController extends Controller
{   
    function __construct()
    {
        $this->middleware('permission:listar-cargos|crear-cargos|editar-cargos|eliminar-cargos', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear-cargos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cargos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-cargos', ['only' => ['destroy']]);
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
        
        $cargo = Cargos::findOrFail($id);
        $area = $cargo->idArea;
        $cargo->area()->dissociate();
        $usurs = User::Where('idCargo',$cargo->id);
        
        $cargo->delete();
        return response()->json(['success' => 'Cargo eliminado correctamente']);   

    }
}
