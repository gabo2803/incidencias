<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Cargos;
use App\Models\Supers;
use App\Models\Userequipos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:listar-usuarios|crear-usuarios|editar-usuarios|eliminar-usuarios', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-usuarios', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuarios', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-usuarios', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::leftjoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftjoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as rol')
            ->orderby('users.id')
            ->get();
        return view('usuarios.index', compact('usuarios'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $cargos = Cargos::orderBy('descripcion', 'ASC')->get();
        $supers = Supers::all();
        return view('usuarios.create', compact('roles', 'cargos', 'supers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'primerNombre' => 'required|string|max:255',
            'segundoNombre',
            'primerApellido' => 'required|string|max:255',
            'segundoApellido',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'sexo' => 'required',
            'roles' => 'required',
            'idCargo' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);


        if (!($input['responsable'])) {
            $superuser = Supers::find($input['responsable']);
            $superuser->responsable = $user->id;
            $superuser->save();
        }

        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        $userequipo = $usuario->equipos;
        //dd($userequipo);

        return view('usuarios.show', compact('usuario','userequipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userroles = $usuario->roles->pluck('name')->all();
        $cargos = Cargos::orderBy('descripcion', 'ASC')->get();
        $responsable = Supers::where('responsable', $id)->first();
        $supers = Supers::all();
        return view('usuarios.edit', compact('roles', 'cargos', 'supers', 'usuario', 'userroles', 'responsable'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'primerNombre' => 'required|string|max:255',
            'segundoNombre',
            'primerApellido' => 'required|string|max:255',
            'segundoApellido',
            'email' => 'required|email|unique:users,email,' . $id,
            'sexo',
            'roles' => 'required',
            'idCargo' => 'required'
        ]);
        $input = $request->all();
        $user = User::find($id);
        if (($input['responsable']) != NULL) {
            $superuser = Supers::find($input['responsable']);
            $superuser->responsable = $user->id;
            $superuser->save();
        }
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $responsable = Supers::where('responsable', $id)->first();
        if ($responsable) {
            return response()->json(['success' => 'El usuario No se puede eliminar es responsable de area']);
        }
        $tieneEquipo = Userequipos::where('idUser', $id)->first();

        if ($tieneEquipo) {
            return response()->json(['success' => 'El usuario No se puede eliminar tiene equipos asignados']);
        }
        User::find($id)->delete();
        return response()->json(['success' => 'Usuario eliminado correctamente']);


    }
}
