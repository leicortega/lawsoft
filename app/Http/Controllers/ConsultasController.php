<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\ResponderConsulta;
use Illuminate\Http\Request;
use App\Models\Respuesta;
use App\Models\Consulta;
use Carbon\Carbon;

class ConsultasController extends Controller
{
    public function index() {
        $consultas = Consulta::where('leido', '0')->orderBy('fecha', 'desc')->paginate(10);

        return view('consultas.index', ['consultas' => $consultas]);
    }

    public function contestadas() {
        $consultas = Consulta::with(array('respuestas' => function ($query) {
            $query->where('leido', '0');
        }))->orderBy('fecha', 'desc')->paginate(10);

        return view('consultas.index', ['consultas' => $consultas]);
    }

    public function ver(Request $request) {
        $consulta = Consulta::find($request['id']);

        return view('consultas.ver', ['consulta' => $consulta]);
    }

    public function responder(Request $request) {
        $date = Carbon::now('America/Bogota');

        Consulta::find($request['id'])->update(['leido' => '1']);

        $path = ($request->file('adjunto_correo')) ? $request->file('adjunto_correo')->getPathname() : '';
        $nombre_file = ($request->file('adjunto_correo')) ? $request->file('adjunto_correo')->getClientOriginalName() : '';
        $mine = ($request->file('adjunto_correo')) ? $request->file('adjunto_correo')->getClientMimeType() : '';

        Respuesta::create([
            'fecha' => $date->format('Y-m-d'),
            'mensaje' => $request['content'],
            'user_id' => auth()->user()->id,
            'leido' => '1',
            'consultas_id' => $request['id'],
        ])->save();

        Mail::to($request['correo'])->send(new ResponderConsulta($request['content'], $request['id'], $path, $nombre_file, $mine));

        return redirect('/consultas/contestadas')->with(['mensaje_enviado' => 1]);

        return ['enviado' => 1];
    }

    public function prueba(Request $request) {
        return view('correos.mensaje_cliente');
    }
}
