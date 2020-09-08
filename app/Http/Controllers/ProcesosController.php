<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Actuacion;
use App\Models\Cliente;
use App\Models\Proceso;
use Carbon\Carbon;

class ProcesosController extends Controller
{
    public function crear() {
        return view('procesos.crear');
    }

    public function civil() {
        $procesos = Proceso::with('clientes')->where('tipo', 'Civil')->paginate(10);

        $proceso_name = 'Civil';

        return view('procesos.index', ['proceso_name' => $proceso_name, 'procesos' => $procesos]);
    }

    public function familia() {
        $procesos = Proceso::with('clientes')->where('tipo', 'Familia')->paginate(10);

        $proceso_name = 'Familia';

        return view('procesos.index', ['proceso_name' => $proceso_name, 'procesos' => $procesos]);
    }

    public function laboral() {
        $procesos = Proceso::with('clientes')->where('tipo', 'Laboral')->paginate(10);

        $proceso_name = 'Laboral';

        return view('procesos.index', ['proceso_name' => $proceso_name, 'procesos' => $procesos]);
    }

    public function seguridad_social() {
        $procesos = Proceso::with('clientes')->where('tipo', 'Seguridad Social')->paginate(10);

        $proceso_name = 'Seguridad Social';

        return view('procesos.index', ['proceso_name' => $proceso_name, 'procesos' => $procesos]);
    }

    public function administrativo() {
        $procesos = Proceso::with('clientes')->where('tipo', 'Administrativo')->paginate(10);

        $proceso_name = 'Administrativo';

        return view('procesos.index', ['proceso_name' => $proceso_name, 'procesos' => $procesos]);
    }

    public function penal() {
        $procesos = Proceso::with('clientes')->where('tipo', 'Penal')->paginate(10);

        $proceso_name = 'Penal';

        return view('procesos.index', ['proceso_name' => $proceso_name, 'procesos' => $procesos]);
    }

    public function search(Request $request) {
        $cliente = Cliente::where('identificacion', $request['id'])->limit(1)->get();

        return $cliente;
    }

    public function create(Request $request) {
        $date = Carbon::now('America/Bogota');

        $cliente = Cliente::where('identificacion', $request['identificacion'])->limit(1)->get();

        // Si el cliente no Existe, lo creamos
        if ($cliente->isEmpty()) {
            $cliente = Cliente::create([
                'identificacion' => $request['identificacion'],
                'nombre' => $request['nombre'],
                'direccion' => $request['direccion'],
                'telefono' => $request['telefono'],
                'correo' => $request['correo'],
            ]);
            $cliente->save();
        }

        $last_proceso = Proceso::limit(1)->orderBy('id', 'desc')->get()[0]->id ?? 1;
        
        if ($last_proceso < 9) {
            $num_proceso = (Proceso::limit(1)->orderBy('id', 'desc')->get()->count() == 0) ? '001' : '00'.($last_proceso+1);
        } else if($last_proceso >= 9 && $last_proceso < 99) {
            $num_proceso = '0'.($last_proceso+1);
        } else {
            $num_proceso = $last_proceso+1;
        }

        $extension_file = pathinfo($request->file('proceso_file')->getClientOriginalName(), PATHINFO_EXTENSION);

        switch ($request['tipo']) {
            case 'Civil':
                $num_proceso = 'CI'.$num_proceso;
                $ruta_file = 'docs/procesos/civil/';
                $nombre_file = 'CI'.$date->format('YmdHis').'.'.$extension_file;
                Storage::disk('public')->put($ruta_file.$nombre_file, File::get($request->file('proceso_file')));

                break;

            case 'Familia':
                $num_proceso = 'FA'.$num_proceso;
                $ruta_file = 'docs/procesos/familia/';
                $nombre_file = 'FA'.$date->format('YmdHis').'.'.$extension_file;
                Storage::disk('public')->put($ruta_file.$nombre_file, File::get($request->file('proceso_file')));

                break;

            case 'Laboral':
                $num_proceso = 'LA'.$num_proceso;
                $ruta_file = 'docs/procesos/laboral/';
                $nombre_file = 'LA'.$date->format('YmdHis').'.'.$extension_file;
                Storage::disk('public')->put($ruta_file.$nombre_file, File::get($request->file('proceso_file')));

                break;

            case 'Seguridad Social':
                $num_proceso = 'SE'.$num_proceso;
                $ruta_file = 'docs/procesos/seguridad_social/';
                $nombre_file = 'SE'.$date->format('YmdHis').'.'.$extension_file;
                Storage::disk('public')->put($ruta_file.$nombre_file, File::get($request->file('proceso_file')));

                break;

            case 'Administrativo':
                $num_proceso = 'AD'.$num_proceso;
                $ruta_file = 'docs/procesos/administrativo/';
                $nombre_file = 'AD'.$date->format('YmdHis').'.'.$extension_file;
                Storage::disk('public')->put($ruta_file.$nombre_file, File::get($request->file('proceso_file')));

                break;

            case 'Penal':
                $num_proceso = 'PE'.$num_proceso;
                $ruta_file = 'docs/procesos/penal/';
                $nombre_file = 'PE'.$date->format('YmdHis').'.'.$extension_file;
                Storage::disk('public')->put($ruta_file.$nombre_file, File::get($request->file('proceso_file')));

                break;
        }

        $proceso = Proceso::create([
            'num_proceso' => $num_proceso,
            'tipo' => $request['tipo'],
            'sub_tipo' => $request['sub_tipo'],
            'departamento' => $request['departamento'],
            'ciudad' => $request['ciudad'],
            'descripcion' => $request['descripcion'],
            'proceso_file' => $ruta_file.$nombre_file,
            'clientes_id' => $cliente[0]->id ?? $cliente->id,
            'users_id' => auth()->user()->id,
        ]);

        $proceso->save();

        

        return redirect()->route('ver-proceso', ['id' => $proceso->id]);

    }

    public function ver(Request $request) {
        $proceso = Proceso::where('id', $request['id'])->with('clientes')->with('actuaciones')->with('users')->get();

        return view('procesos.ver', ['proceso' =>$proceso]);
    }

    public function agregar_actuacion(Request $request) {
        $date = Carbon::now('America/Bogota');
        
        $extension_file = pathinfo($request->file('anotacion_file')->getClientOriginalName(), PATHINFO_EXTENSION);

        $ruta_file = 'docs/procesos/actuaciones/';
        $nombre_file = 'AC'.$date->format('YmdHis').'.'.$extension_file;

        Storage::disk('public')->put($ruta_file.$nombre_file, File::get($request->file('anotacion_file')));

        $actuacion = Actuacion::create([
            'fecha' => $request['fecha'],
            'actuacion' => $request['actuacion'], 
            'anotacion' => $request['anotacion'], 
            'f_inicio_termino' => $request['f_inicio_termino'], 
            'f_fin_termino' => $request['f_fin_termino'], 
            'anotacion_file' => $ruta_file.$nombre_file, 
            'procesos_id' => $request['procesos_id'] 
        ]);
        $actuacion->save();

        return redirect()->route('ver-proceso', [ 'id' => $request['procesos_id'] ]);
    }

    public function buscar_view(Request $request) {
        return view('procesos.buscar');
    }

    public function buscar(Request $request) {
        $procesos = DB::table('procesos')
                    ->join('clientes', 'clientes.id', '=', 'procesos.clientes_id')
                    ->where('procesos.num_proceso', $request['buscar'])
                    ->orWhere('clientes.identificacion', $request['buscar'])
                    ->get();

        $clientes = Cliente::where('identificacion', $request['buscar'])->get();
        
        return view('procesos.buscar', ['procesos' => $procesos, 'clientes' => $clientes, 'busqueda' => $request['buscar']]);
    }
}






