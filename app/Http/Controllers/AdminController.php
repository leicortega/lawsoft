<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function usuarios() {
        $usuarios = User::paginate(10);

        return view('administrador.usuarios', ['usuarios' => $usuarios]);
    }

    public function usuarios_create(Request $request) {
        $usuario = User::create([
            'identificacion' => $request['identificacion'], 
            'name' => $request['name'], 
            'email' => $request['email'], 
            'password' => Hash::make($request['password']), 
            'estado' => 'Activo'
        ]);

        if ( $usuario->save() ) {
            $usuario->assignRole($request['rol']);
            $usuario->givePermissionTo($request['permisos']);

            $usuarios = User::paginate(10);

            return redirect()->back()->with(['creado' => 1, 'usuarios' => $usuarios]);
        }
    }
}
