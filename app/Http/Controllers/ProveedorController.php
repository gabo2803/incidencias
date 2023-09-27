<?php

namespace App\Http\Controllers;

use App\Models\Provedores;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:listar-proveedores|crear-proveedores|editar-proveedores|eliminar-proveedores', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear-proveedores', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proveedores', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-proveedores', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Provedores::all();
        return view('proveedores.index', compact('proveedores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'=>'required',
            'nit'=>'required',
            'email',
            'direccion',
            'telefono',
        ]);
        $input = $request->all();

        $proveedor = Provedores::create($input);
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor Creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = Provedores::find($id);
        return view('proveedores.show',compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Provedores::find($id);
        return view('proveedores.edit',compact('proveedor'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre'=>'required',
            'nit'=>'required',
            'email',
            'direccion',
            'telefono',
        ]);
        $input = $request->all();
        $proveedor = Provedores::find($id);
        $proveedor->update($input);
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Provedores::find($id)->delete();
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor Eliminado exitosamente');
    }
}
