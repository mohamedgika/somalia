<?php

namespace App\Http\Controllers\Dashboard\Chat\Chat;

use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();

        return view('broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message')]);
    }
}
