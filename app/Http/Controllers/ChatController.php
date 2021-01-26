<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Mensaje;
use App\Models\Chat;
use App\User;

class ChatController extends Controller
{
    public $date;

    public function __construct() {
        $this->middleware('auth');
        $this->date = Carbon::now('America/Bogota');
    }

    public function index() {
        $chats = Chat::all();

        return view('chat.index', ['chats' => $chats]);
    }

    public function crear() {
        $users = User::all();

        return view('chat.index', ['users' => $users]);
    }

    public function mensajes(Request $request) {
        $chat = Chat::where(function ($query) use ($request) {
                $query->where('user_id_one', auth()->user()->id);
                $query->where('user_id_two', $request->id);
            })->orWhere(function ($query) use ($request) {
                $query->where('user_id_two', auth()->user()->id);
                $query->where('user_id_one', $request->id);
            })->first();

        if (is_null($chat)) {
            $chat = Chat::create([
                'user_id_one' => auth()->user()->id,
                'user_id_two' => $request->id,
            ]);
        }

        $mensajes = Mensaje::where('chats_id', $chat->id)->with(['chats' => function ($query) {
            $query->with('user_one');
            $query->with('user_two');
        }])->get();

        $receptor = ($mensajes[0]) && ($mensajes[0]->chats->user_one->id == auth()->user()->id) ? 'user_one' : 'user_two';

        return view('chat.index', ['chat' => $chat, 'mensajes' => $mensajes, 'receptor' => $receptor]);
    }

    public function enviar(Request $request) {
        Mensaje::create([
            'fecha' => $this->date->format('Y-m-d H:i:s'),
            'mensaje' => $request['mensaje'],
            'envio' => auth()->user()->id,
            'chats_id' => $request['chat_id']
        ]);

        return redirect()->back();
    }

    public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
