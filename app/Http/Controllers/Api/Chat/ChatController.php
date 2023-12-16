<?php

namespace App\Http\Controllers\Api\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chat = Chat::where(['user_id_1','user_id_2'],auth()->user()->id)->get();
        return response()->json($chat);
    }

    public function sendMessage(Request $request)
    {
        if($request->content){
            $chat = Chat::create([
                'user_id_1'=>auth()->user()->id,
                'user_id_2'=>$request->user_id,
            ]);

            Message::create([
                'chat_id' => $chat->id,
                'content' => $request->content
            ]);
        }

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
