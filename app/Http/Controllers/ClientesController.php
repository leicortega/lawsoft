<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index() {
        $clientes = Cliente::with('procesos')->paginate(10);

        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function ver(Request $request) {
        $cliente = Cliente::with('procesos')->find($request['id']);

        return view('clientes.ver', ['cliente' => $cliente]);
    }

    public function crear() {
        return view('clientes.crear');
    }

    public function create(Request $request) {
        if ($request->file('cedula')) {
            $extension_file_cedula = pathinfo($request->file('cedula')->getClientOriginalName(), PATHINFO_EXTENSION);
            $ruta_file_cedula = 'docs/clientes/documentos/';
            $nombre_file_cedula = 'cedula_'.$request['identificacion'].'.'.$extension_file_cedula;
            Storage::disk('public')->put($ruta_file_cedula.$nombre_file_cedula, File::get($request->file('cedula')));
        }

        if ($request->file('eps')) {
            $extension_file_eps = pathinfo($request->file('eps')->getClientOriginalName(), PATHINFO_EXTENSION);
            $ruta_file_eps = 'docs/clientes/documentos/';
            $nombre_file_eps = 'eps_'.$request['identificacion'].'.'.$extension_file_eps;
            Storage::disk('public')->put($ruta_file_eps.$nombre_file_eps, File::get($request->file('eps')));
        }

        if ($request->file('arl')) {
            $extension_file_arl = pathinfo($request->file('arl')->getClientOriginalName(), PATHINFO_EXTENSION);
            $ruta_file_arl = 'docs/clientes/documentos/';
            $nombre_file_arl = 'arl_'.$request['identificacion'].'.'.$extension_file_arl;
            Storage::disk('public')->put($ruta_file_arl.$nombre_file_arl, File::get($request->file('arl')));
        }

        if ($request->file('afp')) {
            $extension_file_afp = pathinfo($request->file('afp')->getClientOriginalName(), PATHINFO_EXTENSION);
            $ruta_file_afp = 'docs/clientes/documentos/';
            $nombre_file_afp = 'afp_'.$request['identificacion'].'.'.$extension_file_afp;
            Storage::disk('public')->put($ruta_file_afp.$nombre_file_afp, File::get($request->file('afp')));
        }

        $cliente = Cliente::create([
            'identificacion' => $request['identificacion'],
            'nombre' => $request['nombre'], 
            'direccion' => $request['direccion'], 
            'telefono' => $request['telefono'], 
            'correo' => $request['correo'], 
            'cedula' => $nombre_file_cedula ?? NULL, 
            'eps' => $nombre_file_eps ?? NULL, 
            'arl' => $nombre_file_arl ?? NULL, 
            'afp' => $nombre_file_afp ?? NULL
        ]);

        if ($cliente->save()) {
            return redirect()->route('ver-cliente', ['id' => $cliente->id]);
        }
    }

    public function add_cedula(Request $request) {
        $extension_file_cedula = pathinfo($request->file('cedula')->getClientOriginalName(), PATHINFO_EXTENSION);
        $ruta_file_cedula = 'docs/clientes/documentos/';
        $nombre_file_cedula = 'cedula_'.$request['identificacion'].'.'.$extension_file_cedula;
        Storage::disk('public')->put($ruta_file_cedula.$nombre_file_cedula, File::get($request->file('cedula')));

        $cliente = Cliente::find($request['id']);

        $cliente->update([
            'cedula' => $nombre_file_cedula
        ]);

        return redirect()->back();
    }

    public function add_eps(Request $request) {
        $extension_file_eps = pathinfo($request->file('eps')->getClientOriginalName(), PATHINFO_EXTENSION);
        $ruta_file_eps = 'docs/clientes/documentos/';
        $nombre_file_eps = 'eps_'.$request['identificacion'].'.'.$extension_file_eps;
        Storage::disk('public')->put($ruta_file_eps.$nombre_file_eps, File::get($request->file('eps')));

        $cliente = Cliente::find($request['id']);

        $cliente->update([
            'eps' => $nombre_file_eps
        ]);

        return redirect()->back();
    }

    public function add_arl(Request $request) {
        $extension_file_arl = pathinfo($request->file('arl')->getClientOriginalName(), PATHINFO_EXTENSION);
        $ruta_file_arl = 'docs/clientes/documentos/';
        $nombre_file_arl = 'arl_'.$request['identificacion'].'.'.$extension_file_arl;
        Storage::disk('public')->put($ruta_file_arl.$nombre_file_arl, File::get($request->file('arl')));

        $cliente = Cliente::find($request['id']);

        $cliente->update([
            'arl' => $nombre_file_arl
        ]);

        return redirect()->back();
    }

    public function add_afp(Request $request) {
        $extension_file_afp = pathinfo($request->file('afp')->getClientOriginalName(), PATHINFO_EXTENSION);
        $ruta_file_afp = 'docs/clientes/documentos/';
        $nombre_file_afp = 'afp_'.$request['identificacion'].'.'.$extension_file_afp;
        Storage::disk('public')->put($ruta_file_afp.$nombre_file_afp, File::get($request->file('afp')));

        $cliente = Cliente::find($request['id']);

        $cliente->update([
            'afp' => $nombre_file_afp
        ]);

        return redirect()->back();
    }
}
