<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-areas|crear-areas|editar-areas|eliminar-areas', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear-areas', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-areas', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-areas', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Areas::all();
        return view('areas.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'description'=>'required',
            'piso' => 'required'
        ]);

        $input = $request->all();
        $area = Areas::create($input);

        return redirect()->route('areas.index',)
                        ->with('success','Area created successfully');        
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
        $area = Areas::find($id);

        return view('areas.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->Validate($request,[
            'description'=>'required',
            'piso' => 'required'
        ]);

        $input = $request->all();
        $area = Areas::find($id);
        $area->update($input);

        return redirect()->route('areas.index',)
                        ->with('success','Area Actualizada successfully');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Areas::find($id)->delete();
        return response()->json(['success' => 'Area eliminada correctamente']);
    }
}
