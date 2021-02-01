<?php

namespace App\Http\Controllers;
use App\Models\Detalle_proceso;
use App\Models\Demandado;
use App\Models\Abogado;

use Illuminate\Http\Request;

class DemandadosController extends Controller
{
    public function index() {
        $demandados = Demandado::paginate(10);

        return view('demandados.index', ['demandados' => $demandados]);
    }

    public function agregar_demandado(Request $request) {
        if ( $request['existe_demandado_1'] != 'Si' ) {
            Demandado::create([
                'identificacion' => $request['identificacion_demandado_1'],
                'nombre' => $request['nombre_demandado_1'],
                'telefono' => $request['telefono_demandado_1'],
                'correo' => $request['correo_demandado_1'],
            ]);

            return redirect()->back()->with(['demandado' => 1]);
        }

        return redirect()->back()->with(['demandado' => 0]);
    }

    public function delete(Request $request) {
        return Demandado::find($request['id'])->delete();
    }

    public function ver(Request $request) {
        $demandado = Demandado::find($request['id']);

        $detalle_procesos = Detalle_proceso::where('demandados_id', $request['id'])->with('abogados')->with('procesos')->get();

        return view('demandados.ver', ['demandado' => $demandado, 'detalle_procesos' => $detalle_procesos]);
    }

    public function update(Request $request) {
        $demandado = Demandado::find($request['id']);

        $demandado->update([
            'identificacion' => $request['identificacion'],
            'nombre' => $request['nombre'],
            'telefono' => $request['telefono'],
            'correo' => $request['correo'],
            'direccion' => $request['direccion'],
        ]);

        return redirect()->back()->with(['update' => 1]);
    }

    public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
